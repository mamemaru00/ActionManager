<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;
use App\Models\TradingCompany;

class StoreFunctionTest extends TestCase
{
    private $project;
    private $tradingCompany;

    protected function setUp(): void
    {
        parent::setUp();
        $this->project = new Project;
        $this->tradingCompany = new TradingCompany;
    }

    // test_Store_Functionメソッドを作成(trading_company_id あり)
    public function test_Store_Function_With_trading_company_id()
    {
        $user = User::find(1);

        $data = [
            'user_id' => $user->id,
            'trading_company_id' => 1,
            'project_code' => '0000060',
            'project_name' => '鉄道会社案件',
            'sales_in_charge' => '2024/01/01',
            'order_amount' => '9999',
            'order_date' => '2023/01/01',
            'status' => '有効化',
        ];
        $this->project->fill($data)->save();

        // 新しいプロジェクトが作成されたか判定
        $this->assertDatabaseHas('projects', ['project_code' => '0000060']);
    }

    // test_Store_Functionメソッドを作成(trading_company_id なし)
    public function test_Store_Function_Without_trading_company_id()
    {
        $user = User::find(1);

        $this->tradingCompany->fill([
            'trading_company_name' => '鉄道会社',
            'trading_company_manager_name' => '鉄道太郎',
            'trading_company_tel' => '09012345678',
        ])->save();

        $data = [
            'user_id' => $user->id,
            'trading_company_id' => $this->tradingCompany->id,
            'project_code' => '0000061',
            'project_name' => '鉄道会社案件',
            'sales_in_charge' => '2024/01/01',
            'order_amount' => '9999',
            'order_date' => '2023/01/01',
            'status' => '有効化',
        ];
        $this->project->fill($data)->save();

        // 新しいプロジェクトが作成されたか判定
        $this->assertDatabaseHas('projects', ['project_code' => '0000061']);
        $this->assertDatabaseHas('trading_companies', ['trading_company_name' => '鉄道会社']);
    }

    // createTradingCompanyInfoのテスト作成
    public function test_CreateTradingCompanyInfo()
    {
        $this->tradingCompany->fill([
            'trading_company_name' => '鉄道会社',
            'trading_company_manager_name' => '鉄道太郎',
            'trading_company_tel' => '09012345678',
        ])->save();

        $this->assertDatabaseHas('trading_companies', ['id' => $this->tradingCompany->id]);
    }
}
