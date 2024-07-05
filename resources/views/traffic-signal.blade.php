<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traffic Signal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/assets/css/signal.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    
</head>
<body>

    <div class="container" >
        <form action="javascript:void(0)" id="traffic-form" method="post"> 
            @csrf       
            <div class="row">
                <div class="col-md-3">
                    <div class="col-md-5 signal red" id="signal-a">A</div>
                    <div class="col-md-7"><input class="form-control" type="text" placeholder="enter Sequence" name="sequence[a]"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-5 signal red" id="signal-b">B</div>
                    <div class="col-md-7"><input class="form-control" type="text" placeholder="enter Sequence" name="sequence[b]"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-5 signal red" id="signal-c">C</div>
                    <div class="col-md-7"><input class="form-control" type="text" placeholder="enter Sequence" name="sequence[c]"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-5 signal red" id="signal-d">D</div>
                    <div class="col-md-7"><input class="form-control" type="text" placeholder="enter Sequence" name="sequence[d]"></div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="col-md-3">Green Interval</label>
                    <input class="form-control col-md-4" id="greenInterval" type="text">
                </div>
                <div class="col-md-6">
                    <label for="" class="col-md-3">Yellow Interval</label>
                    <input class="form-control col-md-4" id="yellowInterval" type="text">
                </div>
            </div>
            <div class="row">
                <button type="submit" class="col-1 btn btn-success">Start</button>
                <button type="button" class="col-1 btn btn-danger" id="stop-btn">Stop</button>
            </div>
        </form>

    </div>
    {!! JsValidator::formRequest('App\Http\Requests\SignalRequest') !!}
    <script>
        var signalUrl = "{{ route('start-signal')}}";
        var getSignalUrl = "{{ route('get-signal')}}";
    </script>
    <script src="{{ asset('public/assets/js/signal.js')}}"></script>
</body>
</html>