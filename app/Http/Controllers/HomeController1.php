<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController1 extends Controller
{
    public function index(){
        return "Hello World!!";
    } 
    public function data($name,$marks){
        return "The name is $name and marks are $marks";

    }
    public function data1(){
        return view("test");
    }
}
