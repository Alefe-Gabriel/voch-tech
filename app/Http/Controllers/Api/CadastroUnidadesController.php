<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UnidadeRequest;
use App\Core\Adapters\CadastroUnidades;

class CadastroUnidadesController extends Controller
{
    public function __construct(
        private readonly CadastroUnidades $service,
    ) { }

    public function cadastro(UnidadeRequest $request) {
        $unidade = $request->validated();

        $response = $this->service->cadastrar($unidade);

        return response()->json(
            [
                'message' => $response->__get('message'),
                'content' => $response->__get('content'),
            ],
            $response->__get('statusCode')
        );
    }
}
