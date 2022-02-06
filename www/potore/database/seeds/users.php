<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '星野',
                'email' => 'testuser@potore-cam.com',
                'password' => 'dk348gweo0',
                'intoro' => '東京で写真やってます。仲良くしてください！',
                'avatar' => 'files/avatar/1.jpg'
            ]
        ]);
    }
}
