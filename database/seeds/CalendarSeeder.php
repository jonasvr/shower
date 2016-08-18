<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<3; $i++)
        {
            DB::table('reservaties')->insert([
                'device_id' => '1',
                'user_id' => '1',
                'start' => Carbon::create(2016, 8, 18, 13, $i*15, 0)
            ]);

            DB::table('reservaties')->insert([
                'device_id' => '1',
                'user_id' => '1',
                'start' => Carbon::create(2016, 8, 19, 13, $i*15, 0)
            ]);

        }
    }
}
