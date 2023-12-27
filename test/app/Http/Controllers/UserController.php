<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\TradingCompany;
use App\Services\ChatWorkService;
use App\Repositories\TradingCompanyInfoRepository;
use App\Repositories\ProjectInfoRepository;
use App\Repositories\UserRepository;
use App\Services\OfficeServices;
use App\Services\ProjectService;

class UserController extends Controller
{
    public function index(Project $project)
    {
        $authUser = (new UserRepository)->getAuthUser();
        $officeName = (new OfficeServices)->getUserOfficeName($authUser);

        $projectData = (new ProjectInfoRepository($project))->getProjectData();

        return view('user.index', compact('officeName', 'projectData'));
    }

    public function create(Request $request, TradingCompany $tradingCompany)
    {
        $tradingCompanyInfoRepository = new TradingCompanyInfoRepository($tradingCompany);
        $tradingCompanyData = $tradingCompanyInfoRepository->getTradingCompanyData();

        $userAllData = (new UserRepository)->getUserAllData();

        return view('user.create', compact('tradingCompanyData', 'userAllData'));
    }

    public function store(Request $request, Project $project, TradingCompany $tradingCompany)
    {
        try {
            (new ProjectInfoRepository($project))->createProjectInfo($request, $tradingCompany);
            
            $chatWorkService = new ChatWorkService;
            $body = "新規に{$request->project_name}が作成されました。";
            $chatWorkService->addMessage($body);
            $chatWorkService->sendMessage();

        } catch (\Exception $e) {
            info($e->getMessage());
        }
   
        return redirect()->route('user.index');
    }

    public function show($id, Project $project, TradingCompany $tradingCompany)
    {
        $projectScope = (new ProjectInfoRepository($project))->getProjectScope($id);

        $userName = (new UserRepository)->getUserName($projectScope->user_id); 
        
        $tradingCompanyShowInfo = (new TradingCompanyInfoRepository($tradingCompany))->getTradingCompanyScope($projectScope->trading_company_id);

        return view('user.show', compact('projectScope', 'userName', 'tradingCompanyShowInfo'));
    }

    public function edit($id)
    {
        $projectData = (new ProjectInfoRepository(new Project))->getProjectScope($id);

        return view('user.edit', compact('projectData'));
    }

    public function update(Request $request, $id)
    {
        (new ProjectInfoRepository(new Project))->updateProjectInfo($request, $id);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        // Projectsテーブルから指定のIDのレコード1件を取得して削除
        $projectDestroy = (new ProjectInfoRepository(new Project))->getProjectScope($id);
        (new ProjectService)->projectDestroy($projectDestroy);
        return redirect()->route('user.index');
    }
}
