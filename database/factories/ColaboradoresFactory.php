<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Colaboradores;
use App\Models\Unidades;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaboradores>
 */
class ColaboradoresFactory extends Factory
{
    
    protected $model = Colaboradores::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unidadeAleatoria = Unidades::inRandomOrder()->firstOrFail();

        return [
            'unidade_id' => $unidadeAleatoria->id,
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
