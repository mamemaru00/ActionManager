<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(TradingCompanySeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(AdminSeeder::class);

        Project::factory()->count(50)->create();
    }
}
