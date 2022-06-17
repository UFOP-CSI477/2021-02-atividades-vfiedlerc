<?php

namespace Database\Seeders;

use App\Models\Coleta;
use App\Models\Entidade;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $itens = Item::factory(5)->create();
        Entidade::factory(5)->create()->each(function ($entidade) use ($itens) {
            Coleta::factory(10)->create([
                'item_id' => $itens->random()->id,
                'entidade_id' => $entidade
            ]);
        });
    }
}
