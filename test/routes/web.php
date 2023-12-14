<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('user')-> middleware('auth:users')->group(function(){
    // プロジェクト一覧画面
    Route::get('index', [UserController::class, 'index'])->name('index');
    // プロジェクト登録画面
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    // プロジェクト詳細画面
    Route::get('show/{id}', [UserController::class, 'show'])->name('show');
    // プロジェクト編集画面
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [UserController::class, 'update'])->name('update');   
    //削除機能
    Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('destroy'); 
});

//プロジェクトのルートを作成する

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/users/index', function () {
//     return view('users.index');
// })->middleware(['auth'])->name('users.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
