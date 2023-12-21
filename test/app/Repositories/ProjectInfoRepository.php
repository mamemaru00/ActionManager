<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\TradingCompany;

class ProjectInfoRepository
{
    private $project;
    private $tradingCompany;

    public function __construct(
    Project $project,
    TradingCompany $tradingCompany
    )
    {
        $this->project = $project;
        $this->tradingCompany = $tradingCompany;
    }

    public function createProjectInfo($request)
    {
        $request->merge(['trading_company_id' => $this->tradingCompany->id]);
        $this->project->fill($request->all())->save();
    }
}