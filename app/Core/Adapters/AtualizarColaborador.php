<?php

namespace App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface AtualizarColaborador {

  public function atualizar(string $id, array $colaborador): ResponseDto;
}