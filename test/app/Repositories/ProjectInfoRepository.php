<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\TradingCompanyInfoRepository;

class ProjectInfoRepository
{
    public function createProjectInfo($request)
    {
        $project = new Project;

        if ($request->trading_company_id) {
            $project->fill($request->all())->save();
        } else {
            $tradingCompanyInfoRepository = new TradingCompanyInfoRepository;
            $tradingCompany = $tradingCompanyInfoRepository->createTradingCompanyInfo($request);

            $request->merge(['trading_company_id' => $tradingCompany->id]);

            $project->fill($request->all())->save();
        }
    }
    
    public function getProjectScope($id)
    {
        $project = new Project;
        $projectScope = $project->findOrFail($id);
        return $projectScope;
    }
}