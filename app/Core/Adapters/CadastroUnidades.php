<?php

namespace App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface CadastroUnidades {

  public function cadastrar(array $unidade): ResponseDto;
}