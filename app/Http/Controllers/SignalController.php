<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SignalRequest;
use App\Models\Signal;

class SignalController extends Controller
{
    public function startSignal(SignalRequest $request)
    {
        foreach($request->sequence as $key => $value) {
            $data = Signal::where('name', $key)->first();
            if ($data) {
                $data->update(['sequence' => $value]);
            } else {
                Signal::create(['name' => $key, 'sequence' => $value]);
            }
        }
        $signal = Signal::orderBy('sequence', 'ASC')->get();
        return response()->json($signal);
    }

    public function getSignal()
    {
        $signal = Signal::orderBy('sequence', 'ASC')->get();
        return response()->json($signal);
    }
}
