<?php

namespace App\Core\Dtos;

class ResponseDto {
  private $statusCode;
  private $message;
  private $content = null;

  public function __get($property) {

    if (property_exists($this, $property)) {
        return $this->$property;
    } else {
        throw new \Exception("Propriedade inválida: $property");
    }
  }

  public function __set($property, $value) {

    if (property_exists($this, $property)) {
        $this->$property = $value;
    } else {
        throw new \Exception("Propriedade inválida: $property");
    }
  }
}