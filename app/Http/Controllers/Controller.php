<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //public function getItems(){
    //  $items = HTTP::get('http://127.0.0.1:8000/api/items'); //PARA LEER LA API
    //  $itemsArray = $items->json();
    //  return view('welcome', compact('itemsArray'));
    //}
}
