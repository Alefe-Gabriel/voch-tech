<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unidades;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UnidadesFactory extends Factory
{
    protected $model = Unidades::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_fantasia' => $this->faker->company,
            'razao_social' => $this->faker->unique()->company,
            'cnpj' => $this->faker->unique()->numerify('##############')
        ];
    }
}
