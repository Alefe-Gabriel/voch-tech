<?php

namespace App\Core\Dtos;

use App\Core\Dtos\ResponseDto;

class InternalServerErrorResponseDto extends ResponseDto {

  public function __construct($error) {

    $this->statusCode = 500;
    $this->message = 'Falha de requisição, um erro interno de servidor ocorreu.';
    $this->content = $error;
  }
}