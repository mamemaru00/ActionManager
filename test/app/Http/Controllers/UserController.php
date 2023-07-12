<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $office_name = $user->office->office_name;
        $project_data = Project::orderBy('sales_in_charge', 'desc')->get();

        return view('users.index', compact('office_name', 'project_data'));
    }

    public function create()
    {
        //新規作成画面を表示
        return view('users.create');
    }

    public function store(Request $request)
    {
        $projects = new Project;

        $projects->fill($request->all())->save();
   
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $project_scope = Project::findOrFail($id);

        return view('users.show', compact('project_scope'));
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $project_data = Project::findOrFail($id);

        if ($user_id !== $project_data->manager_code) {
            abort(404);
        }

        return view('users.edit', compact('project_data'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->update([
            "status" => $request->status,
        ]);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        //
    }
}
