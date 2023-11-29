<?php

namespace App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface CadastroColaboradores {

  public function cadastrar(array $colaborador): ResponseDto;
}