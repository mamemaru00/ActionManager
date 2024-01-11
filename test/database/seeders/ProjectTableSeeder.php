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
                'user_id' => 1,
                'trading_company_id' => 1,
                'project_code' => '000001',
                'project_name' => 'スポーツ用具案件',
                'sales_in_charge' => '2024/01/01',
                'order_amount' => '9999',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
        Project::create(
            [
                'id' => '2',
                'user_id' => 2,
                'trading_company_id' => 2,
                'project_code' => '000002',
                'project_name' => '案件アプリ',
                'sales_in_charge' => '2024/06/01',
                'order_amount' => '1000000',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
        Project::create(
            [
                'id' => '3',
                'user_id' => 3,
                'trading_company_id' => 3,
                'project_code' => '000003',
                'project_name' => '水産卸業案件',
                'sales_in_charge' => '2024/07/01',
                'order_amount' => '222222',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
        Project::create(
            [
                'id' => '4',
                'user_id' => 1,
                'trading_company_id' => 1,
                'project_code' => '000004',
                'project_name' => 'ホリデー案件',
                'sales_in_charge' => '2024/07/01',
                'order_amount' => '222222',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
        Project::create(
            [
                'id' => '5',
                'user_id' => 1,
                'trading_company_id' => 1,
                'project_code' => '000005',
                'project_name' => 'スノーボード案件',
                'sales_in_charge' => '2024/07/01',
                'order_amount' => '222222',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
        Project::create(
            [
                'id' => '6',
                'user_id' => 1,
                'trading_company_id' => 1,
                'project_code' => '000006',
                'project_name' => 'スキー案件',
                'sales_in_charge' => '2024/07/01',
                'order_amount' => '222222',
                'order_date' => '2023/01/01',
                'status' => '有効化',
            ],
        );
    }
}
