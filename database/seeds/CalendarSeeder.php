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

            DB::table('reservaties')->insert([
                'device_id' => '1',
                'user_id' => 1+$i,
                'start' => Carbon::create(2016, 8, 25, 8, $i*15, 0)
            ]);

            DB::table('reservaties')->insert([
                'device_id' => '2',
                'user_id' => 2+$i,
                'start' => Carbon::create(2016, 8, 25, 9, $i*15, 0)
            ]);

        }

        for($i = 0; $i<3; $i++)
        {
            DB::table('reservaties')->insert([
                'device_id' => '1',
                'user_id' => random_int(6,16),
                'start' => Carbon::create(2016, 8, 18, 13, $i*15, 0)
            ]);

            DB::table('reservaties')->insert([
                'device_id' => '1',
                'user_id' =>random_int(6,16),
                'start' => Carbon::create(2016, 8, 19, 13, $i*15, 0)
            ]);

            DB::table('reservaties')->insert([
                'device_id' => '1',
                'user_id' => random_int(6,16),
                'start' => Carbon::create(2016, 8, 17, 8, $i*15, 0)
            ]);

            DB::table('reservaties')->insert([
                'device_id' => '2',
                'user_id' => random_int(6,16),
                'start' => Carbon::create(2016, 8, 18, 9, $i*15, 0)
            ]);

        }
    }
}
