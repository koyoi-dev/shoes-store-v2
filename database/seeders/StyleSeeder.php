<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    protected static $styles = [
        'Boots',
        'Casual Sneakers',
        'Sandals',
        'Slippers',
        'Running Shoes',
        'Training Shoes',
        'Basketball Shoes'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$styles as $style) {
            Style::query()
                ->create([
                    'name' => $style
                ]);
        }
    }
}

