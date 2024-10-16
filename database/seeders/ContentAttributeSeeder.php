<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContentAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contentAttribute = [
            [
                'id' => '123e4567-e89b-12d3-a456-426614174010',
                'content_id' => '123e4567-e89b-12d3-a456-426614174000',
                'header' => 'DISKON LEBARAN HEMAT',
                'body' => '<p>-ML</p><p>-VALO</p>',
                'footer' => 'TERIMA KASIH',
            ],

            [
                'id' => '123e4567-e89b-12d3-a456-426614174011',
                'content_id' => '123e4567-e89b-12d3-a456-426614174001',
                'header' => 'DISKON LEBARAN HEMAT',
                'body' => '<p>-ML</p><p>-VALO</p>',
                'footer' => 'TERIMA KASIH',
            ],

            [
                'id' => '123e4567-e89b-12d3-a456-426614174012',
                'content_id' => '123e4567-e89b-12d3-a456-426614174002',
                'header' => 'DISKON LEBARAN HEMAT',
                'body' => '<p>-ML</p><p>-VALO</p>',
                'footer' => 'TERIMA KASIH',
            ],
        ];

        DB::table('content_attribute')->insert($contentAttribute);
    }
}
