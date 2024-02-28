<?php

namespace Database\Seeders;

use App\Models\VitaminMineralFactor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VitaminMineralFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        VitaminMineralFactor::insert([
            ['name' => 'Vitamina A', 'unit' => 'mcg ER', 'factor' => 800 ],
            ['name' => 'Vitamina D', 'unit' => 'mcg', 'factor' => 5 ],
            ['name' => 'Vitamina E', 'unit' => 'mg ET', 'factor' => 20 ],
            ['name' => 'Vitamina K', 'unit' => 'mcg', 'factor' => 80 ],
            ['name' => 'Vitamina C', 'unit' => 'mg', 'factor' => 60 ],
            ['name' => 'Tiamina (B1)', 'unit' => 'mg', 'factor' => 1.4 ],
            ['name' => 'Riboflavina (B2)', 'unit' => 'mg', 'factor' => 1.6 ],
            ['name' => 'Niacina', 'unit' => 'mg EN', 'factor' => 18 ],
            ['name' => 'Vitamina B6', 'unit' => 'mg', 'factor' => 2 ],
            ['name' => 'Folato', 'unit' => 'mcg', 'factor' => 200 ],
            ['name' => 'Vitamina B12', 'unit' => 'mcg', 'factor' => 1 ],
            ['name' => 'Ac. Pantoténico', 'unit' => 'mg', 'factor' => 10 ],
            ['name' => 'Biotina', 'unit' => 'mcg', 'factor' => 300 ],
            ['name' => 'Colina', 'unit' => 'mg', 'factor' => 550 ],
            ['name' => 'Calcio', 'unit' => 'mg', 'factor' => 800 ],
            ['name' => 'Cromo +3', 'unit' => 'mcg', 'factor' => 800 ],
            ['name' => 'Cobre', 'unit' => 'mg', 'factor' => 300 ],
            ['name' => 'Hierro', 'unit' => 'mg', 'factor' => 14 ],
            ['name' => 'Magnesio', 'unit' => 'mg', 'factor' => 15 ],
            ['name' => 'Fósforo', 'unit' => 'mg', 'factor' => 2 ],
            ['name' => 'Zinc', 'unit' => 'mg', 'factor' => 70 ],
            ['name' => 'Selenio', 'unit' => 'mcg', 'factor' => 35 ],
        ]);
    }
}
