<?php

namespace App\Services;

use App\Repositories\TradingCompanyInfoRepository;
use App\Repositories\ProjectInfoRepository;

class ProjectService {

    private $tradingCompanyInfoRepository;
    private $projectInfoRepository;

    public function __construct(
        TradingCompanyInfoRepository $tradingCompanyInfoRepository, 
        ProjectInfoRepository $projectInfoRepository
    )
    {
        $this->tradingCompanyInfoRepository = $tradingCompanyInfoRepository;
        $this->projectInfoRepository = $projectInfoRepository;
    }

    // public function getProjectData() {
    //     $projectData = Project::orderBy('sales_in_charge', 'desc')->get();
    //     return $projectData;
    // }

    public function createProject($request) {
        $this->tradingCompanyInfoRepository->createTradingCompanyInfo($request);

        $this->projectInfoRepository->createProjectInfo($request);
    }

    // public function getProjectScope($id) {
    //     $projectScope = Project::findOrFail($id);
    //     return $projectScope;
    // }
}
