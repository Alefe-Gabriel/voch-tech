<?php

namespace App\Core\Usecases;

use App\Core\Dtos\ResponseDto;
use App\Core\Adapters\NotaColaborador;
use App\Core\Dtos\InternalServerErrorResponseDto;
use App\Core\Dtos\BadRequestErrorResponseDto;
use App\Core\Dtos\SuccessResponseDto;
use App\Models\CargoColaborador;


class NotaColaboradorImpl implements NotaColaborador {

    public function salvar(array $nota): ResponseDto {
        try {
            $idColaborador = $nota['colaborador_id'];
            $idCargo = $nota['cargo_id'];
            $novaNota = $nota['nota_desempenho'];

            $cargoColaborador = CargoColaborador::where('colaborador_id', $idColaborador)
                ->where('cargo_id', $idCargo)
                ->first();

            if ($cargoColaborador) {

                $cargoColaborador->nota_desempenho = $novaNota;
                $cargoColaborador->save();
                return new SuccessResponseDto('Nota de desempenho atualizada com sucesso.');
            } else {
                // Se não existir, crie uma nova entrada
                $cargoColaborador = new CargoColaborador([
                    'colaborador_id' => $idColaborador,
                    'cargo_id' => $idCargo,
                    'nota_desempenho' => $novaNota,
                ]);

                $cargoColaborador->save();
                return new SuccessResponseDto('Nota de desempenho cadastrada com sucesso.');
            }
        } catch (\Exception $error) {
            return new InternalServerErrorResponseDto($error->getMessage());
        }
    }
}
