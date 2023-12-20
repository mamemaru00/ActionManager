<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Services\ChatWorkService;
use App\Models\TradingCompany;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $officeName = $user->office->officeName;
        $projectData = Project::orderBy('sales_in_charge', 'desc')->get();

        return view('user.index', compact('officeName', 'projectData'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        try {
            $tradingCompany = new TradingCompany;
            $tradingCompany->fill($request->all())->save();

            $projectCreation = new Project;
            $request->merge(['trading_company_id' => $tradingCompany->id]);
            $projectCreation->fill($request->all())->save();

            // ChatWorkServiceのaddMessageメソッドを呼び出す
            $projectCreateMessage = new ChatWorkService();
            $body = "新規に{$request->project_name}が作成されました。";
            $projectCreateMessage->addMessage($body);
            $projectCreateMessage->sendMessage();

        } catch (\Exception $e) {
            info($e->getMessage());
        }
   
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $projectScope = Project::findOrFail($id);

        return view('user.show', compact('projectScope'));
    }

    public function edit($id)
    {
        $userId = Auth::user()->id;
        $projectData = Project::findOrFail($id);

        if ($userId !== $projectData->manager_code) {
            abort(404);
        }

        return view('user.edit', compact('projectData'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update([
            "status" => $request->status,
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        // Projectsテーブルから指定のIDのレコード1件を取得して削除
        $projectDestroy = Project::find($id);
        $projectDestroy->delete();
        return redirect()->route('user.index');
    }
}
