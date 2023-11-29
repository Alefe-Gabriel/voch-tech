<?php

namespace App\Core\Usecases;

use App\Models\Cargo;
use App\Core\Dtos\ResponseDto;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\SuccessResponseDto;
use App\Core\Adapters\ListarCargos;

class ListarCargosImpl implements ListarCargos {


  public function listar(): ResponseDto {
    
    try {

      $result = Cargo::all();

      return new SuccessResponseDto($result);
    } catch (\Exception $error) {

      return new InternalServerErrorResponseDto($error->getMessage());
    }
  }
}