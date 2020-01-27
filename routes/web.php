<?php

use App\Categoria;

Route::get('/', function () {
    return view('main');
});


Route::resource('articulos', 'ArticulosController');
Route::resource('categorias', 'CategoriasController');

// Route::get('categorias', function(){
//     return Categoria::all();
// });


