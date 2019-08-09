<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        for($i = 0; $i < 100; $i ++)
        {
            $arr[] = [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('secret'),
            ];
        }
        DB::table('users')->insert($arr);
    }
}
