<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Adapters\CadastroColaboradores;
use App\Http\Requests\ColaboradorRequest;

class CadastroColaboradorController extends Controller
{
    public function __construct(
        private readonly CadastroColaboradores $service,
    ) { }

    public function cadastrar(ColaboradorRequest $request) {

        $colaborador = $request->validated();

        $response = $this->service->cadastrar($colaborador);

        return response()->json(
            [
                'message' => $response->__get('message'),
                'content' => $response->__get('content'),
            ],
            $response->__get('statusCode')
        );
    }
}
