<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TradingCompany;

class TradingCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TradingCompany::create(
            [
                'id' => '1',
                'project_id' => '1',
                'trading_company_name' => '株式会社A',
                'trading_company_manager_name' => '山田',
                'trading_company_tel' => '01234567891',
            ],
            [
                'id' => '2',
                'project_id' => '2',
                'trading_company_name' => '株式会社B',
                'trading_company_manager_name' => '高橋',
                'trading_company_tel' => '01234567891',
            ],
            [
                'id' => '3',
                'project_id' => '3',
                'trading_company_name' => '株式会社C',
                'trading_company_manager_name' => '佐藤',
                'trading_company_tel' => '01234567891',
            ],
        );
    }
}
