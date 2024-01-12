<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrganismoAuditor;

class OrganismoAuditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OrganismoAuditor::insert([
            ['nombre' => 'Eurofins'],
            ['nombre' => 'Bureau Veritas'],
            ['nombre' => 'ACA / Cencosud'],
        ]);
    }
}
