<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['user_name' => '','contents' => '1つ目の投稿になります'],
            ['user_name' => '','contents' => 'Laravelの投稿ページを作りました'],
            ['user_name' => '','contents' => '投稿についてのCRUD一式を作っています'],
            ['user_name' => '','contents' => 'MVCの役割を体験中です'],
            ['user_name' => '','contents' => '初期レコードがこれで終わりです。']
            ]);
    }
}
