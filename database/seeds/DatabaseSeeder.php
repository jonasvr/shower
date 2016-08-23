<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StartSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(CalendarSeeder::class);
    }
}
