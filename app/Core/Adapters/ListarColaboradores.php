<?php

namespace  App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface ListarColaboradores {

  public function listar(?int $pagina, ?int $tamanhoDaPagina): ResponseDto;
}