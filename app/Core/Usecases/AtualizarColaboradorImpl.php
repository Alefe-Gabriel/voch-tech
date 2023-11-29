<?php

namespace App\Core\Usecases;

use App\Models\Colaboradores;
use App\Core\Dtos\ResponseDto;
use App\Core\Dtos\BadRequestErrorResponseDto;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\SuccessResponseDto;
use App\Core\Adapters\AtualizarColaborador;

class AtualizarColaboradorImpl implements AtualizarColaborador {

  public function atualizar(string $id, array $colaboradorAtualizado): ResponseDto {
    
    $colaborador = Colaboradores::find($id);

    if (!$colaborador) {

      return new BadRequestErrorResponseDto();
    }

    try {

      $colaborador->update($colaboradorAtualizado);

      return new SuccessResponseDto($colaborador);
    } catch (\Exception $error) {

      return new InternalServerErrorResponseDto($error->getMessage());
    }
  }
}