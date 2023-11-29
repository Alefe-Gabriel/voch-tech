<?php

namespace App\Core\Usecases;

use App\Models\Colaboradores;
use App\Core\Dtos\ResponseDto;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\SuccessResponseDto;
use App\Core\Adapters\ListarColaboradores;

class ListarColaboradoresImpl implements ListarColaboradores {

  public function listar(?int $pagina, ?int $tamanhoDaPagina): ResponseDto {

    $pagina = $pagina ?? 1;
    $tamanhoDaPagina = $tamanhoDaPagina ?? 10;

    try {

        $result = Colaboradores::with(['cargos', 'unidade'])
            ->paginate(
                $tamanhoDaPagina,
                ['*'],
                'page',
                $pagina
            );

        $result->getCollection()->transform(function ($item) {
            $item->unidade_id = $item->unidade->nome_fantasia;
            unset($item->unidade);
            return $item;
        });

      return new SuccessResponseDto($result);
    } catch (\Exception $error) {

      return new InternalServerErrorResponseDto($error->getMessage());
    }
  }
}
