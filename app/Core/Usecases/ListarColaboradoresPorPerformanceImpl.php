<?php

namespace App\Core\Usecases;


use App\Models\CargoColaborador;
use App\Core\Dtos\ResponseDto;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\SuccessResponseDto;
use App\Core\Adapters\ListarColaboradoresPorPerformance;

class ListarColaboradoresPorPerformanceImpl implements ListarColaboradoresPorPerformance {

  public function listar(?int $pagina, ?int $tamanhoDaPagina): ResponseDto {

    $pagina = $pagina ?? 1;
    $tamanhoDaPagina = $tamanhoDaPagina ?? 10;

    try {

      $result = CargoColaborador::with(['colaborador.unidade'])
        ->orderBy(
            'nota_desempenho',
            'desc'
        )
        ->paginate(
          $tamanhoDaPagina,
          ['*'],
          'page',
          $pagina
        );

        $result->getCollection()->transform(function ($item) {
            return [
                'nome' => $item->colaborador->nome,
                'cpf' => $item->colaborador->cpf,
                'email' => $item->colaborador->email,
                'cargo' => $item->colaborador->cargos[0]->cargo ?? 'Sem cargo',
                'unidade' => $item->colaborador->unidade->nome_fantasia,
                'nota_desempenho' => $item->nota_desempenho,
            ];
        });

        return new SuccessResponseDto($result);
    } catch (\Exception $error) {

    return new InternalServerErrorResponseDto($error->getMessage());
  }
  }
}
