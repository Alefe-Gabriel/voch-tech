<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\SalvarColaboradorController;
use App\Http\Controllers\Views\CadastrarUnidadeController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cadastrar-unidade', function () {
    return view('cadastrar-unidade');
})->name('cadastrar.unidade');

Route::get('/salvar-colaborador', function () {
    return view('salvar-colaborador');
})->name('salvar.colaborador');
