<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(){
        return Categoria::all();
    }

    public function store(Request $request){
        $categoria = new Categoria;

        $categoria->categoria = $request->categoria;

        $categoria->save();
    }

    public function destroy($id){
        $categoria = Categoria::find($id);

        $categoria->delete();

    }

    public function update(Request $request, $id){
        $categoria = Categoria::find($id);
        $categoria->categoria = $request->categoria;
        $categoria->update();
    }
}
