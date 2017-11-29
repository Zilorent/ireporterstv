<?php

namespace App\Http\Controllers;

use App\Attempts;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home',[
            'attempts'=>Attempts::find($request->session()->get('attempt_id')),
            'users'=>User::all()
        ]);
    }
}
