<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','precio','descripcion','imagen','categoria_id'];

    //Relación con el modelo Categoría
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
