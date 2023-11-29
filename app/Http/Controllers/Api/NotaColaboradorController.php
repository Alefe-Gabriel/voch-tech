<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Adapters\NotaColaborador;
use App\Http\Requests\NotaColaboradorRequest;

class NotaColaboradorController extends Controller
{
    public function __construct(
        private readonly NotaColaborador $service,
    ) {}

    public function salvar(NotaColaboradorRequest $request) {

        $nota = $request->validated();

        $response = $this->service->salvar($nota);

        return response()->json(
            [
                'message' => $response->__get('message'),
                'content' => $response->__get('content'),
            ],
            $response->__get('statusCode')
        );
    }
}
