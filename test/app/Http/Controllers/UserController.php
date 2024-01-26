<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatWorkService;
use App\Repositories\TradingCompanyInfoRepository;
use App\Repositories\ProjectInfoRepository;
use App\Repositories\UserRepository;
use App\Services\OfficeServices;
use App\Services\ProjectService;
use App\Http\Requests\createProjectRequest;

class UserController extends Controller
{
    public function index()
    {
        $authUser = (new UserRepository)->getAuthUser();
        $officeName = (new OfficeServices)->getUserOfficeName($authUser);

        $projectData = (new ProjectInfoRepository)->getProjectData();

        return view('user.index', compact('officeName', 'projectData'));
    }

    public function create(Request $request)
    {
        $tradingCompanyInfoRepository = new TradingCompanyInfoRepository;
        $tradingCompanyData = $tradingCompanyInfoRepository->getTradingCompanyData();

        $userAllData = (new UserRepository)->getUserAllData();

        return view('user.create', compact('tradingCompanyData', 'userAllData'));
    }

    public function store(Request $request, createProjectRequest $createProjectRequest)
    {
        try {
            (new ProjectInfoRepository)->createProjectInfo($request);
            
            $chatWorkService = new ChatWorkService;
            $body = "新規に{$request->project_name}が作成されました。";
            $chatWorkService->addMessage($body);
            $chatWorkService->sendMessage();

        } catch (\Exception $e) {
            info($e->getMessage());
        }
   
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $projectScope = (new ProjectInfoRepository)->getProjectScope($id);

        $userName = (new UserRepository)->getUserName($projectScope->user_id); 
        
        $tradingCompanyShowInfo = (new TradingCompanyInfoRepository)->getTradingCompanyScope($projectScope->trading_company_id);

        return view('user.show', compact('projectScope', 'userName', 'tradingCompanyShowInfo'));
    }

    public function edit($id)
    {
        $projectData = (new ProjectInfoRepository)->getProjectScope($id);
        (new ProjectService)->projectDateConversion($projectData);

        $userAllData = (new UserRepository)->getUserAllData();

        return view('user.edit', compact('projectData', 'userAllData'));
    }

    public function update(Request $request, $id)
    {
        (new ProjectService)->projectUserIdConversion($request, $id);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        // Projectsテーブルから指定のIDのレコード1件を取得して削除
        $projectDestroy = (new ProjectInfoRepository)->getProjectScope($id);
        (new ProjectService)->projectDestroy($projectDestroy);
        return redirect()->route('user.index');
    }

    public function searchProject(Request $request)
    {
        $authUser = (new UserRepository)->getAuthUser();
        $officeName = (new OfficeServices)->getUserOfficeName($authUser);

        $projectData = (new ProjectInfoRepository)->searchProject($request);

        return view('user.index', compact('officeName', 'projectData'));
    }
}
