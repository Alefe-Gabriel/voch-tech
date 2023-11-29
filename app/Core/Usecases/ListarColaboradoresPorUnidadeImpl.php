<?php

namespace App\Core\Usecases;

use App\Core\Dtos\ResponseDto;
use App\Core\Adapters\ListarColaboradoresPorUnidade;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\SuccessResponseDto;
use App\Models\Unidades;

class ListarColaboradoresPorUnidadeImpl implements ListarColaboradoresPorUnidade {

  public function listar(
    string $idUnidade,
    ?int $pagina,
    ?int $tamanhoDaPagina
  ): ResponseDto {

    $pagina = $pagina ?? 1;
    $tamanhoDaPagina = $tamanhoDaPagina ?? 10;

    try {

        $result = Unidades::with(['colaboradores' => function ($query) use ($idUnidade) {
            $query->where('unidade_id', $idUnidade);
        }])
        ->where('id', $idUnidade)
        ->orderBy('nome_fantasia', 'asc')
        ->paginate(
            $tamanhoDaPagina,
            ['*'],
            'page',
            $pagina
        );

        $result->getCollection()->transform(function ($item) {
            return [
                'nome_fantasia' => $item->nome_fantasia,
                'razao_social' => $item->razao_social,
                'cnpj' => $item->cnpj,
                'total_colaboradores' => count($item->colaboradores),
            ];
        });

        return new SuccessResponseDto($result);
    } catch (\Exception $error) {

      return new InternalServerErrorResponseDto($error->getMessage());
    }
  }
}
