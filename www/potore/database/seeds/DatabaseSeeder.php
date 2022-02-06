<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(m_areas::class);
        $this->call(m_fees::class);
        $this->call(m_rolls::class);
        $this->call(users::class);
        $this->call(t_photos::class);
    }
}
