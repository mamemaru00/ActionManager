<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'test1',
            'email' => 'test@test.com',
            'password' => bcrypt('xxx'),
            'created_at' => '2023/01/01 11:11:11',
        ]);
    }
}
