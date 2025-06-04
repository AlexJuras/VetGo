<?php

namespace Database\Factories;

use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
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
            'especie' => $this->faker->word(),
            'data_nascimento' => $this->faker->date(),
            'detalhes' => $this->faker->sentence(),
            'tutor_id' => Tutor::factory(),
        ];
    }
}
