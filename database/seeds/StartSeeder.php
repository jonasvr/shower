<?php

use Illuminate\Database\Seeder;

class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jonas Van Reeth',
            'email' => 'jonasvanreeth@gmail.com',
            'password' => bcrypt('test1234'),
            'admin' => 1,
            'koten_id'=>1,
            'steps'=>2,
            'sex'=>0,
        ]);

        DB::table('users')->insert([
            'name' => 'Karen De Pooter',
            'email' => 'karendepooter@gmail.com',
            'password' => bcrypt('test1234'),
            'admin' => 0,
            'koten_id'=>1,
            'steps'=>2,
            'sex'=>1,
        ]);

        DB::table('users')->insert([
            'name' => 'Jos De Bakker',
            'email' => 'Josdebakker@gmail.com',
            'password' => bcrypt('test1234'),
            'admin' => 0,
            'koten_id'=>1,
            'steps'=>2,
            'sex'=>0,
        ]);

        DB::table('users')->insert([
            'name' => 'Karel De Ridder',
            'email' => 'Karelderidder@gmail.com',
            'password' => bcrypt('test1234'),
            'admin' => 0,
            'koten_id'=>1,
            'steps'=>2,
            'sex'=>0,
        ]);

        DB::table('users')->insert([
            'name' => 'Jolien Smedt',
            'email' => 'joliensmedt@gmail.com',
            'password' => bcrypt('test1234'),
            'admin' => 0,
            'koten_id'=>1,
            'steps'=>2,
            'sex'=>1,
        ]);

        DB::table('kotens')->insert([
            'code' => 'WKMnj',
            'street' => 'plantinkaai',
            'nr' => 1,
            'city' => 'Antwerpen',
            'postalcode' => 2000,
        ]);



        DB::table('devices')->insert([
            'device_code' => str_random(10),
            'koten_id' => 1,
            'name' => 'shower 1',
            'state' => 1,
            'spend_time' => mt_rand(5, 15),
        ]);

        DB::table('devices')->insert([
            'device_code' => 1234567890,
            'koten_id' => 1,
            'name' => 'shower 2',
            'state' => 1,
            'spend_time' => 0,
        ]);

        ////kot2///
        DB::table('kotens')->insert([
            'code' => 'KAsdf',
            'street' => 'plantinkaai',
            'nr' => 2,
            'city' => 'Antwerpen',
            'postalcode' => 2000,
        ]);

        for($i = 0; $i<10; $i++) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
                'sex' => random_int(0,1),
                'koten_id' => 2,
            ]);
        }
    }
}
