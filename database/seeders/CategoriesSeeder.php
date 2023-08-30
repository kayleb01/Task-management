<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'work',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'personal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'urgent',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]);
    }
}
