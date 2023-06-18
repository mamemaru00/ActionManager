<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'hayata' => '早田',
            'yamada' => '山田',
            'tanaka' => '田中'
        ];

        $employee_codes = [ 
            'hayata' => '001',
            'yamada' => '002',
            'tanaka' => '003',
        ];

        foreach($names as $email => $user){
            User::create([
                'name' => $user,
                'employee_code' =>$employee_codes[$email], 
                'email' => $email.'@example.com',
                'password' => bcrypt('xxx')
            ]);
        }
    }
}
