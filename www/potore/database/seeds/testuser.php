<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class testuser extends Seeder
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
                'name' => 'ねこみみさん',
                'email' => 'kopoupaz@yahoo.co.jp',
                'password' => 'testtest',               
                'intoro'=> 'うぇいうぇい系です。ねこみみが好き。富山でよく撮影しています。'
            ],
            [
                'name' => 'ねこみみサンタクロース',
                'email' => 'kopoupaz2@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> 'ちょろまか系です。犬みみが好き。北海道でよく撮影しています。'
            ],
            [
                'name' => 'やまもとさん',
                'email' => 'kopoupaz3@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> 'うぇいうぇい系です。ねこみみが好き。富山でよく撮影しています。'
            ],
            [
                'name' => 'きたやまさん',
                'email' => 'kopoupaz4@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> 'おらおら系です。ねこみみが好き。北海道でよく撮影しています。エンジョイしたい。'
            ],
            [
                'name' => 'サンタクロース',
                'email' => 'kopoupaz5@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> 'ホッホー系です。栗が好き。空の上でよく撮影しています。'
            ],
            [
                'name' => 'ねこみみさんさん',
                'email' => 'kopoupaz6@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> 'うぇいうぇい系です。サブ垢つくっちゃいました'
            ],
            [
                'name' => 'ねこみみさんですよ',
                'email' => 'kopoupaz7@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> 'うぇいうぇい系です。またまたサブ垢避難用。'
            ],
            [
                'name' => '鳥になりたい',
                'email' => 'kopoupaz8@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> 'ハイウェイを鳥になって攻めたい。自由な撮影に憧れてます。'
            ],
            [
                'name' => 'クロスチョップマン',
                'email' => 'kopoupaz9@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> '寝込んだらおしまい。いつでもアクティブにサブちゃんが憧れ。'
            ],
            [
                'name' => '美和',
                'email' => 'kopoupaz10@yahoo.co.jp',
                'password' => 'testtest',
                'intoro'=> '天使です'
            ],
        ]);
    }
}
