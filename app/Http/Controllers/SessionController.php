<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function setSession(Request $request) {
        // $request->session()->put('username', 'Manish');
        $request->session()->put(['username' =>'Manish', 'password'=>123]);
        // session(['username'=>'Manish','password' => 123]);
        // $request->session()->push('email','maish#gmail.com');
        echo "Session has been set!";
    }

    public function fetchSessionData(Request $request) {
        echo "Welcome".$request->session()->get('username');
        // return $request->session()->all();
    }

    public function destroySession(Request $request) {
        // $request->session()->forget('username');
        // $request->session()->flush();
        $request->session()->pull('username','Manish');
        echo "The session is destroyed";
    }
}

//pull will tell what data is being destroyed but forget will not tell you this.