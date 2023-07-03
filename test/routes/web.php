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

Route::prefix('users')-> middleware('auth')->group(function(){
    Route::get('index', [UserController::class, 'index'])->name('users.index');
    Route::get('show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    //データの置き換えはput
    Route::put('update/{id}', [UserController::class, 'update'])->name('users.update');    
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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
