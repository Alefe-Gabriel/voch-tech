<?php

namespace  App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface ListarColaboradoresPorPerformance {

  public function listar(?int $pagina, ?int $tamanhoDaPagina): ResponseDto;
}