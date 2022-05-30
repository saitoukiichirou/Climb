<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimbController;
use App\Http\Controllers\UsersListController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/register', [ClimbController::class, 'register']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//コントローラー・メソッドがわかりづらいので元の記法に直すこと！
Route::get('/score_boards', 'ClimbController@scoreBoards')->name('score_boards');


//管理者権限のみアクセス可能
Route::middleware(['can:admin'])->group(function(){
//    Route::get('/users_list.index', [UsersListController::class, 'search'])->name('users_list.search');
//    Route::post('/users_list.index', [UsersListController::class, 'index'])->name('users_list.index');
    Route::resource('/users_list', 'UsersListController');
    Route::resource('/records', 'RecordsController');
    Route::resource('/problems', 'ProblemsController');
//    Route::get('/problems_list', [ClimbController::class, 'problemsList'])->name('problems_list');
    Route::get('/daily_records', 'ClimbController@dailyRecords')->name('daily_records');
});

