<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudante>
 */
class EstudanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),    
            'telefone' => $this->faker->phoneNumber(),
            'data_nascimento' => $this->faker->date(),
            'matricula' => $this->faker->unique()->numerify('MATRICULA-####'),
        ];
    }
}
