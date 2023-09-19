<?php

namespace Database\Seeders;

use App\Models\Relation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payloads = [
            [
                'id' => 1,
                'name' => 'Ayah',
            ],
            [
                'id' => 2,
                'name' => 'Ibu',
            ],
            [
                'id' => 3,
                'name' => 'Wali',
            ],
        ];

        foreach ($payloads as $payload) {
            Relation::firstOrCreate($payload);
        }
    }
}
