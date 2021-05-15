<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            'user_id' => 1,
            'title' => User::all()->random()->id,
            'body' => 'これはテスト投稿です',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
