<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\TradingCompany;
use App\Repositories\TradingCompanyInfoRepository;

class ProjectInfoRepository
{
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getProjectData()
    {
        $projectData = Project::orderBy('sales_in_charge', 'desc')->get();
        return $projectData;
    }

    public function createProjectInfo($request, TradingCompany $tradingCompany)
    {
        if ($request->trading_company_id) {
            $this->project->fill($request->all())->save();
        } else {
            $tradingCompanyInfoRepository = new TradingCompanyInfoRepository($tradingCompany);
            $tradingCompanyInfoRepository->createTradingCompanyInfo($request);

            $request->merge(['trading_company_id' => $tradingCompany->id]);

            $this->project->fill($request->all())->save();
        }
    }
    
    public function getProjectScope($id)
    {
        $projectScope = $this->project->findOrFail($id);
        return $projectScope;
    }

    public function updateProjectInfo($request, $id)
    {
        $projectScope = $this->project->findOrFail($id);
        $projectScope->update([
            "status" => $request->status,
        ]);
    }
}