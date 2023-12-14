<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    //他の権限でのログインを制限
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::select('id', 'name', 'email', 'created_at')
        ->paginate(3);

        return view('admin.index', 
        compact('users'));
    }

    public function create()
    {
        //新規作成画面の表示
        return view('admin.create');
    }

    public function store(Request $request)
    {
        //新規作成画面のフォームデータ保存
        $userCreation = new User;

        $userCreation->fill($request->all())->save();

        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();
   
        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
