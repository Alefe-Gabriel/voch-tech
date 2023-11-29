<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AtualizarColaboradorController;
use App\Http\Controllers\Api\CadastroColaboradorController;
use App\Http\Controllers\Api\CadastroUnidadesController;
use App\Http\Controllers\Api\ListarCargosController;
use App\Http\Controllers\Api\ListarColaboradoresController;
use App\Http\Controllers\Api\ListarColaboradoresPorPerformanceController;
use App\Http\Controllers\Api\ListarColaboradoresPorUnidadeController;
use App\Http\Controllers\Api\NotaColaboradorController;

Route::put(
    '/colaboradores/{id}',
    [AtualizarColaboradorController::class, 'atualizar']
);


Route::post(
    '/colaboradores',
    [CadastroColaboradorController::class, 'cadastrar']
);

Route::post(
    '/unidades',
    [CadastroUnidadesController::class, 'cadastro']
);

Route::get(
    '/cargos',
    [ListarCargosController::class, 'listar']
);

Route::get(
    '/colaboradores',
    [ListarColaboradoresController::class, 'listar']
);

Route::get(
    '/colaboradores-por-performance',
    [ListarColaboradoresPorPerformanceController::class, 'listar']
);

Route::get(
    '/colaboradores-por-unidade/{idUnidade}',
    [ListarColaboradoresPorUnidadeController::class, 'listar']
);

Route::post(
    '/nota-colaborador',
    [NotaColaboradorController::class, 'salvar']
);
