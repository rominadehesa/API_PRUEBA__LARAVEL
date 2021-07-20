<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController; 

// API Routes

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
METHOD  |    URI        |   ACCION             | RESPUESTA |
get     |api/items      |ItemController@index  | Detalles de todos los items
post    |api/items      |ItemController@store  | Guarda informacion de un item
get     |api/items/{id} |ItemController@show   | Mostrar detalles de un item
put     |api/items/{id} |ItemController@edit   | Editar los detalles de un item
delete  |api/items/{id} |ItemController@destroy| Eliminar un item
*/

Route::get('items', [ItemController::class, 'index']);
Route::post('items', [ItemController::class, 'store']);
Route::get('items/{item}', [ItemController::class, 'show']);
Route::put('items/{item}', [ItemController::class, 'update']);
Route::delete('items/{item}', [ItemController::class, 'destroy']);


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('datauser', [AuthController::class, 'dataUser'])->middleware('auth:sanctum'); //es para dar permiso a solo los usuarios autenticados
