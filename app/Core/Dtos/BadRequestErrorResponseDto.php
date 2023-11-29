<?php

namespace App\Core\Dtos;

use App\Core\Dtos\ResponseDto;

class BadRequestErrorResponseDto extends ResponseDto {

  public function __construct($error) {

    $this->statusCode = 400;
    $this->message = 'Requisição inválida';
    $this->content = $error;
  }
}