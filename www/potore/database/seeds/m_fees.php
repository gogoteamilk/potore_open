<?php

use Illuminate\Database\Seeder;
use App\Models\m_fee;

class m_fees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        m_fee::insert([
            ['name' => '未設定'],
            ['name' => '無料'],
            ['name' => '有料'],
            ['name' => '交通費支払希望'],
            ['name' => '要相談'],
        ]);
    }
}
