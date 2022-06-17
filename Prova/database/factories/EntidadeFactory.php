<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entidade>
 */
class EntidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'nome' => $this->faker->company(),
            'bairro' => $this->faker->streetName(),
            'cidade' => $this->faker->city(),
            'estado' => strtoupper(Str::random(2))
        ];
    }
}
