<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<5; $i++)
        {
            DB::table('devices')->insert([
                'device_code' => str_random(10),
                'spend_time' => mt_rand(5, 400),
            ]);
        }
    }
}
