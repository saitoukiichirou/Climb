<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersListController extends Controller
{
    public function viewSelectedUsers(Request $request)
    {
        if (is_null($request->id))
        {
            return redirect('users_list')->with(['status' => 'ユーザーを選択してください']);
        }

        $select_user = User::find($request->id);
        return view('users_list_edit', compact('select_user'));
    }

    public function editUser(Request $request)
    {

        $form = $request->all();
        unset($form['_token']);
//        dd($form);
        if (is_null($form))
        {
            return redirect('users_list_edit');
        }


        $select_user = User::find($request->id);
        $select_user->fill($form)->save();
//        dd($select_user);
        return view('users_list_edit', compact('select_user'))->with(['status' => 'ユーザー情報を更新しました']);
    }
}
