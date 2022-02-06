<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class t_photos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_photos')->insert([
            [
                'photo' => 'files/userphoto/1_4888711223.jpg',
                'title' => 'まつり',
                'comment' => '長崎旅行に行ってきました(´▽｀)',
                'post_user_id' => '1'
            ]
        ]);
    }
}
