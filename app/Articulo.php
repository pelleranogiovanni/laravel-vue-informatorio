<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = ['articulo', 'precio', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
