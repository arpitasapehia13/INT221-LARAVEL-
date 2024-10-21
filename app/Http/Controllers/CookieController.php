<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;


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

    public function deleteCookie() {
        Cookie:: queue(Cookie:: forget('studentname'));
        return response('The cookie has been deleted');
       
    }
    


    }

