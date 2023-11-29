<?php

namespace App\Core\Dtos;

use App\Core\Dtos\ResponseDto;

class CreatedSuccessResponseDto extends ResponseDto {

  public function __construct($result) {

    $this->statusCode = 201;
    $this->message = 'Item criado com sucesso.';
    $this->content = $result;
  }
}
