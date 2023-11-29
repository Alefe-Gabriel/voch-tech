<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Adapters\ListarCargos;

class ListarCargosController extends Controller
{
    public function __construct(
        private readonly ListarCargos $service,
    ) {}

    public function listar() {
        $response = $this->service->listar();

        return response()->json(
            [
                'message' => $response->__get('message'),
                'content' => $response->__get('content'),
            ],
            $response->__get('statusCode')
        );
    }
}
