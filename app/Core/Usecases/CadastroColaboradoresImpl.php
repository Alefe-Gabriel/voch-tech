<?php

namespace App\Core\Usecases;

use App\Models\Colaboradores;
use App\Models\CargoColaborador;
use App\Core\Dtos\ResponseDto;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\CreatedSuccessResponseDto;
use App\Core\Adapters\CadastroColaboradores;

class CadastroColaboradoresImpl implements CadastroColaboradores {

    public function cadastrar(array $colaborador): ResponseDto {

        try {
            $novoColaborador = Colaboradores::create($colaborador);

            if (isset($colaborador['cargo_id'])) {
                $cargoId = $colaborador['cargo_id'];

                if (!$cargoId) {
                    return new InternalServerErrorResponseDto("O ID do cargo não foi fornecido.");
                }

                if (!$novoColaborador->exists) {
                    return new InternalServerErrorResponseDto("O colaborador não foi criado corretamente.");
                }

                CargoColaborador::create([
                    'cargo_id' => $cargoId,
                    'colaborador_id' => $novoColaborador->id,
                    'nota_desempenho' => 0,
                ]);
            }

            return new CreatedSuccessResponseDto($novoColaborador);
        } catch (\Exception $error) {
            return new InternalServerErrorResponseDto($error->getMessage());
        }
    }
}
