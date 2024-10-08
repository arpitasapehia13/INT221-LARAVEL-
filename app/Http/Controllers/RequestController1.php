<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function implementrequest(Request $request){
        $uri = $request->path();
        echo "The path is $uri <br>";
        $pattern = $request->is('admin/*');
        echo "The path starts with admin prefix: $pattern <br>";
        $ismethod = $request->isMethod('POST');
        echo "The method being used : $ismethod <br>";
        $url = $request->url();
        echo "The URL is: $url <br>";
        $fullurl = $request->fullurl();
        echo "The complete url is: $fullurl <br>";
        $namedroute = $request->routeIs('admin.*');
        echo "The route is a named route that starts with admin: $namedroute <br>";
        $fullUrlWithQuery = $request->fullUrlWithQuery(['name' => 'Ajay']);
        echo "$fullUrlWithQuery <br>";
        $querystring = $request->query('marks', 89);
        echo "The query string is: $querystring <br>";
    }
}