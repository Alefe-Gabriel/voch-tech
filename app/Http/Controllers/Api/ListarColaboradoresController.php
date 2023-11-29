<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Adapters\ListarColaboradores;

class ListarColaboradoresController extends Controller
{
    public function __construct(
        private readonly ListarColaboradores $service,
    ) {}

    public function listar(Request $request) {
        $pagina = $request->query('pagina', 1);
        $tamanhoDaPagina = $request->query('tamanhoDaPagina', 10);

        $response = $this->service->listar($pagina, $tamanhoDaPagina);

        return response()->json(
            [
                'message' => $response->__get('message'),
                'content' => $response->__get('content'),
            ],
            $response->__get('statusCode')
        );
    }
}
