<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attempts;
use Illuminate\Support\Facades\App;

class AttemptController extends Controller
{
    public function attempt(Request $request)
    {
        if (!$request->session()->has('attempt_id'))
        {
            $request->session()->put('attempt_id',$request->session()->getId());
        }

        $attempt=Attempts::find($request->session()->get('attempt_id'));

        if (is_null($attempt))
        {
            $attempt = new Attempts();
            $attempt->session_id = $request->session()->get('attempt_id');
            $attempt->attempts = 1;

            $attempt->save();
        }
        else{
            $attempt->attempts++;

            $attempt->save();
        }
    }
}
