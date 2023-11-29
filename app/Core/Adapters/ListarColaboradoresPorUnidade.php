<?php

namespace  App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface ListarColaboradoresPorUnidade {

  public function listar(
    string $idUnidade, 
    ?int $pagina, 
    ?int $tamanhoDaPagina
  ): ResponseDto;
}