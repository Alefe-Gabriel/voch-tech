<?php

namespace App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface ListarCargos {

  public function listar(): ResponseDto;
}