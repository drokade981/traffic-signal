
var form = $('#traffic-form');

var interval, geenInterval, yellowInterval;
var currentIndex = 0;
var signals = [];
var isRunning = false;

form.on('submit', function() {
    geenInterval = parseInt($('#greenInterval').val());
    yellowInterval = parseInt($('#yellowInterval').val());

    if (isNaN(geenInterval) || isNaN(yellowInterval)) {
        alert('Please enter green and yellow interval'); return false;
    }

    if(form.valid()) {        
        $.ajax({
            url : signalUrl,
            type : "POST",
            data : form.serialize(),
            datatype : "json",
            success : function (response) {
                signals = [];
                $.each( response, function( key, value ) {
                    signals.push(value.name);                    
                });
                if (!isRunning) {
                    isRunning = true;
                    setStartSignal();
                }
                // intervalId = setInterval(setSignal, (geenInterval+ yellowInterval)*1000 );
                                
            }
        });
    }
});

$('#stop-btn').click(function() {
    clearInterval(interval);
    isRunning = false;
    $('[id^="signal-"]').removeClass('green yellow').addClass('red');
});


$(document).ready(function(){
    $.ajax({
        url : getSignalUrl,
        type : "GET",
        
        datatype : "json",
        success : function (response) {
            $.each( response, function( key, value ) {
                signals.push(value.name);
                $('#signal-'+value.name).parent().find('input').val(value.sequence);
            });
           
            
        }
    });
})

function setStartSignal() {
    const greenInterval = parseInt($('#greenInterval').val())*1000;
    const yellowInterval = parseInt($('#yellowInterval').val())*1000;

    interval = setInterval(() => {
        console.log(signals);
        // Reset all signals to red
        signals.forEach(signalId => {
            console.log('#signal-'+signalId);
            
            $('#signal-'+signalId).removeClass('green yellow').addClass('red');
        });

        // Set current signal to green
        let currentSignal = signals[currentIndex];
        
        $('#signal-'+currentSignal).removeClass('red').addClass('green');
        
        setTimeout(() => {
            // Change green signal to yellow
            $('#signal-'+currentSignal).removeClass('green').addClass('yellow');
        }, greenInterval);

        // Move to next signal
        currentIndex = (currentIndex + 1) % signals.length;
    }, greenInterval + yellowInterval);
}