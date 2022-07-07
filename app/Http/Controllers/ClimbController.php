<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClimbController extends Controller
{
//    public function usersList()
//    {
//        $users = User::get();
////        dd($users);
//        return view('users_list', compact('users'));
//    }

    public function dailyRecords()
    {
//        return view('daily_records');
    }

    public function scoreBoards()
    {
//        return view('score_boards');
    }

    public function problemsList()
    {
        return view('problems_list');
    }

}
