<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    public function index(){

        return Articulo::all();
    }

    public function store(Request $request){

        // Articulo::create($request->all());

        $articulo = new Articulo;

        $articulo->articulo = $request->articulo;
        $articulo->precio = $request->precio;
        $articulo->categoria_id = $request->categoria_id;

        $articulo->save();

    }
}
