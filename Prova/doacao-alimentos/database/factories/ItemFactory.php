<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $itens = ['Arroz', 'Batata', 'Bermuda', 'Camisa', 'Feijão'];

        return [
            'descricao' => $itens[array_rand($itens)],
        ];
    }
}
