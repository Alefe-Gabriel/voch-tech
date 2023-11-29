<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Adapters\AtualizarColaborador;
use App\Http\Requests\ColaboradorRequest;

class AtualizarColaboradorController extends Controller
{
    public function __construct(
        private readonly AtualizarColaborador $service,
    ) {}

    public function atualizar(
        ColaboradorRequest $request,
        string $id
    ) {

        $colaboradorAtualizado = $request->validated();

        $response = $this->service->atualizar($id, $colaboradorAtualizado);

        return response()->json(
            [
                'message' => $response->__get('message'),
                'content' => $response->__get('content')
            ],
            $response->__get('statusCode')
        );
    }
}
