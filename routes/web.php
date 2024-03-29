<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});


Auth::routes();

//コントローラー・メソッドがわかりづらいので元の記法に直すこと！
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/scores', 'ScoresController@index')->name('scores.index');
Route::post('/success', 'ScoresController@success')->name('scores.success');

//管理者権限のみアクセス可能
Route::middleware(['can:admin'])->group(function(){
    Route::resource('/users_list', 'UsersListController');
    Route::post('/users_list', 'UsersListController@search')->name('users_list.search');
    Route::get('/scores/{score}', 'ScoresController@show')->name('scores.show');
//    Route::resource('/scores', 'ScoresController');
    Route::resource('/records', 'RecordsController');
    Route::resource('/problems', 'ProblemsController');
    Route::resource('/lead_problems', 'LeadProblemsController');
});

