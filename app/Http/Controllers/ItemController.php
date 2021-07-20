<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\ActualizarItemRequest;
use App\Http\Requests\GuardarItemRequest;
use App\Http\Resources\ItemResource;

class ItemController extends Controller {
    /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request){
        //Utilizando el recurso Item, nos ayuda a escructurar mejor los registros
        return ItemResource::Collection(Item::all()); //mostrar todos los registros
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //Funcion para agregar un registro
    public function store(GuardarItemRequest $request){
        return (new ItemResource(Item::create($request->all()))) //Guardamos el registro
            ->additional(['msg'=> 'Se agrego correctamente']);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Funcion para mostrar un registro
    public function show(Item $item){
        return new ItemResource($item);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */

    //Funcion para actualizar un registro
    public function update(ActualizarItemRequest $request, Item $item){
        //dd($item->update($request->all())); //Para saber que devuelve, dd ejecuta la sentencia
        
        $item->update($request->all());
        return (new ItemResource($item))
        ->additional(['msg'=>'Se actualizo correctamente']);

    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Funcion para borrar un registro
    public function destroy(Item $item){
        $item->delete();
        return (new ItemResource($item))
        ->additional(['msg'=>'Se elimino correctamente']);
    }
}
