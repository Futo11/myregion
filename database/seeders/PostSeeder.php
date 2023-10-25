<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
                'title' => 'タイトル',
                'body' => '本文',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1,
                'region_id' => 1,
                'category_id' => 1,
         ]);
    }
}
