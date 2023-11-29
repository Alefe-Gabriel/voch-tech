<?php

namespace App\Core\Dtos;

use App\Core\Dtos\ResponseDto;

class SuccessResponseDto extends ResponseDto {

  public function __construct($content) {

    $this->statusCode = 200;
    $this->message = 'Requisição feita com sucesso.';
    $this->content = $content;
  }
}