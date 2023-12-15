<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// namespaceを追加
use App\Models\Project;
use App\Services\ChatWorkService;

class SalesInChargeConfirmation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SalesInChargeConfirmation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the sales in charge date for each project';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // プロジェクトテーブルから、sales_in_chargeをASCでproject_nameとsales_in_chargeを取得
        $projectSalesInChargeData = Project::orderBy('sales_in_charge', 'asc')->get(); 

        // プロジェクトテーブルから取得したデータをforeachで回して、メッセージを作成、送信する
        foreach ($projectSalesInChargeData as $projectSalesInCharge) {
            $projectCreateMessage = new ChatWorkService();
            $body = "{$projectSalesInCharge->sales_in_charge}:{$projectSalesInCharge->project_name}";
            $projectCreateMessage->addMessage($body);
            $projectCreateMessage->sendMessage();
        }
    }
}
