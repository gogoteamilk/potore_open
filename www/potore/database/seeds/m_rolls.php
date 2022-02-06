<?php

use Illuminate\Database\Seeder;
use App\Models\m_roll;

class m_rolls extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        m_roll::insert([
            ['name' => '未設定'],
            ['name' => 'Photographer'],
            ['name' => 'Model'],
        ]);
    }
}
