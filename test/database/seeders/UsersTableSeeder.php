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

        $affiliation_office = [ 
            'hayata' => '1',
            'yamada' => '2',
            'tanaka' => '3',
        ];

        // $office_code = [
        //     'hayata' => 'AA1',
        //     'yamada' => 'BB2',
        //     'tanaka' => 'CC3',
        // ];

        foreach($names as $email => $user){
            User::create([
                'name' => $user,
                'affiliation_office' =>$affiliation_office[$email], 
                'email' => $email.'@example.com',
                'password' => bcrypt('xxx')
            ]);
        }
    }
}
