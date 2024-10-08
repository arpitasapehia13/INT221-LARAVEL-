<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(){
        $response = new Response("The cookie has been set");
        $response->cookie('studentname','Arpita',0.5);
        return $response;

    }

    public function fetchCookie(Request $request){
        return $request->cookie('studentname');

    }

    public function deleteCookie(){
        $delete = new Delete("The cookie has been deleted");
        $delete->cookie('studentname',null,0);
        return $delete;


    }
}
