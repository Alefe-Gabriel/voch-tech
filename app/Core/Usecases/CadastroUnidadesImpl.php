<?php

namespace App\Core\Usecases;

use App\Models\Unidades;
use App\Core\Dtos\ResponseDto;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\CreatedSuccessResponseDto;
use App\Core\Adapters\CadastroUnidades;

class CadastroUnidadesImpl implements CadastroUnidades {

  public function cadastrar(array $unidade): ResponseDto {

    try {

      $result = Unidades::create($unidade);

      return new CreatedSuccessResponseDto($result);
    } catch (\Exception $error) {

      return new InternalServerErrorResponseDto($error->getMessage());
    }
  }
}