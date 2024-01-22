<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\TradingCompany;
use App\Repositories\TradingCompanyInfoRepository;

class ProjectInfoRepository
{
    private $project;
    private $tradingCompany;

    public function __construct()
    {
        $this->project = new Project;
        $this->tradingCompany = new TradingCompany;
    }

    public function getProjectData()
    {
        $projectData = Project::orderBy('sales_in_charge', 'desc')->paginate(5);
        return $projectData;
    }

    public function createProjectInfo($request)
    {
        if ($request->trading_company_id) {
            $this->project->fill($request->all())->save();
        } else {
            $tradingCompanyInfoRepository = new TradingCompanyInfoRepository;
            $tradingCompanyInfoRepository->createTradingCompanyInfo($request);

            $request->merge(['trading_company_id' => $this->tradingCompany->id]);

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
        $projectScope->fill([
            "user_id" => $request->user_id,
            "sales_in_charge" => $request->sales_in_charge,
            "order_amount" => $request->order_amount,
            "order_date" => $request->order_date,
            "status" => $request->status,
        ])->save();
    }

    public function searchProject($request)
    {
        $search = $request->input('project_name');
        $query = Project::query();

        $search_split = mb_convert_kana($search, 's');
        $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($search_split2 as $value) {
            $query->where('project_name', 'like', '%' . $value . '%');
        }

        $projectData = $query->paginate(5);
        
        return $projectData;
    }
}