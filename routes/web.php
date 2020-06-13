<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Ruta para el CRUD de productos
Route::resource('productos','ProductosController');