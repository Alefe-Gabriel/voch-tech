<?php

namespace  App\Core\Adapters;

use App\Core\Dtos\ResponseDto;

interface NotaColaborador {

    public function salvar(array $nota): ResponseDto;
}
