<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CargoColaborador;
use App\Models\Cargo;
use App\Models\Colaboradores;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CargoColaborador>
 */
class CargoColaboradorFactory extends Factory
{

    protected $model = CargoColaborador::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cargoAleatorio = Cargo::inRandomOrder()->first();
        $colaboradorAleatorio = Colaboradores::inRandomOrder()->first();

        return [
            'cargo_id' => $cargoAleatorio->id,
            'colaborador_id' => $colaboradorAleatorio->id,
            'nota_desempenho' => $this->faker->numberBetween(0, 10),
        ];
    }
}
