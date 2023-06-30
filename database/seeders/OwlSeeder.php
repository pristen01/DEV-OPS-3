<?php

namespace Database\Seeders;

use App\Models\Owl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwlSeeder extends Seeder
{

    /**
     * The list of O.W.L. names that are going to be seeded
     *
     * @var string[]
     */
    public static array $owlNames = ['Defence Against the Dark Arts', 'Care of Magical Creatures',
        'Charms', 'Herbology', 'Potions', 'Transfiguration', 'Astronomy', 'Divination',
        'History of Magic'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$owlNames as $name) {
            // Use the OwlFactory to create an O.W.L. with the $name
            Owl::factory()->create(['name' => $name]);
        }
    }
}
