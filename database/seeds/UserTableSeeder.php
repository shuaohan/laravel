<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username'=>str_random(10),
            'email'=>'2943823468@qq.com',
            'password'=>bcrypt('xucaiqin'),

        ]);
    }
}
