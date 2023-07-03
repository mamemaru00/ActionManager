<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Project;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        //とりあえず、できる範囲で表示はできるようにしておく
        //今後修正すること
        //Userテーブルのoffice_idとOfficeテーブルのidが合致する値を取得する
        //現在は、officeテーブル情報を取得するところまでは完了している
        // $office_data = Office::find(1);
        // $office_data = User::with('office')->get();
        // $office_data = User::where('affiliation_office', "=", Office::where('id'))->get();
        // $office_data = Office::with('id')->find(1); 

        //whereHasで 
        // $office_data = User::query()
        // ->whereHas('office', function (Builder $query){
        //     $query->where('office_id', '=', Office::get());
        // })
        // ->get();
        
        //全て取得した
        // $office_data = User::whereHas('users', function ($query) {
		// 	$query->where('office_id', '=', Office::get());
		//  })
		//  ->with('user')
		//  ->get();

        $office_data = User::whereHas('office', function ($query) {
            $query->whereIn('office_id', Office::pluck('id'));
        })
        ->with('office')
        ->get();

        $project_data = Project::orderBy('sales_in_charge', 'desc')->get();

        return view('users.index', 
        compact('office_data', 'project_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //プロジェクトが表示されないからわかり次第解決する
        //プロジェクトテーブルからデータを持ってくる
        $project_data = Project::find($id);

        return view('users.show', 
        compact('project_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //担当者のみが見れるようにする
        //showと一緒
        //userのidを取得する必要がある
        $user_id = Auth::user();
        // $user_id = User::find($id);
        $project_data = Project::find($id);

        //user_idと担当者コードが合致した時に見ることができる
        if ($user_id->user_id === $project_data->manager_code) {
            return redirect()->route('users.edit');
        }
        else {
            abort(404);
            return view('users.index');
        }

        return view('users.edit', 
        compact('project_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //プロジェクトのidを取得、statusを変更するよう処理を記述
        $project_id = Project::find($id);

        $project_id->update([  
            "status" => $request->status,   
        ]);  

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
