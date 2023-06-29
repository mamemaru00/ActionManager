<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Project;
use App\Models\Office;

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

        // dd($office_data);
        

        $project_data = Project::orderBy('sales_in_charge', 'desc')->get();

        // dd($project_data);

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

        // dd($project_data);

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
        //showと一緒
        $project_data = Project::find($id);

        // dd($project_data);

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
        // $project_id->status = $request->status;
        // dd($project_id);
        // $project_id->save();

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
