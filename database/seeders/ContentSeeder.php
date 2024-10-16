<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = [
            [
                'id' => '123e4567-e89b-12d3-a456-426614174000',
                'subject' => 'First Content Subject',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '123e4567-e89b-12d3-a456-426614174001',
                'subject' => 'Second Content Subject',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '123e4567-e89b-12d3-a456-426614174002',
                'subject' => 'Third Content Subject',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('content')->insert($content);
    }
}
