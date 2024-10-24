<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class validationController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'name'=>'required | min:6 | max:12',
            'email'=>'required| email | max:120',
            'password' => 'required | numeric'
        ],
        //CUSTOMIZED MESSAGE
        $message = [
            'name.required' => "You cant leave name field empty!",
            'name.min' => "Minimum 6 character is required",
        ]
    );
        $name = $request->name;
        echo $name. '<br>';

        $email = $request->email;
        echo $email. '<br>';

        $password = $request->password;
        echo $password. '<br>';
    }


}
