<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoopsController extends Controller
{
    public function displayusers(){
    $users = ['User 1','User 2', 'User 3', 'User 4'];
    return view('loops',compact('users'));
}
}
