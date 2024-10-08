<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function itemsdata(){

        $items = [
            ["name" => "laptop", "price" => 56000],
            ["name" => "phone", "price" => 89000],
            ["name"=>"smartwatch","price"=>10500]
        ];
        // return view('items', ['items' => $items]);
        return $items;

    }
}


