<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create(
            [
                'id' => '1',
                'project_code' => '000001',
                'project_name' => 'ほげ案件',
                'manager_code' => '1',
                'manager_name' => '早田',
                'sales_in_charge' => '2024/01/01',
                'order_amount' => '9999',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
        Project::create(
            [
                'id' => '2',
                'project_code' => '000002',
                'project_name' => '案件アプリ',
                'manager_code' => '1',
                'manager_name' => '山田',
                'sales_in_charge' => '2024/06/01',
                'order_amount' => '1000000',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
        Project::create(
            [
                'id' => '3',
                'project_code' => '000003',
                'project_name' => '水産卸業案件',
                'manager_code' => '1',
                'manager_name' => '早田',
                'sales_in_charge' => '2024/07/01',
                'order_amount' => '222222',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
    }
}
