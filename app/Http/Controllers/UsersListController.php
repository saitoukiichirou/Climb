<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UsersListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd($request);
//        $key = $request->name;
//        if (is_null($key)){
//            $key = null;
//        }
//dd($key);
//        $users = User::where('name', 'like', "%". $request->name. "%")->paginate(10);

        $users = User::paginate(10);
        foreach ($users as $user){
            $now = date('Ymd');
            $birthday = $user->birthday;
            $birthday = str_replace('-', '', $birthday);
            $age = floor(($now - $birthday) / 10000);
            $user['age'] = $age;
        }
        return view('users_list.index', compact('users'));

    }

//    ユーザー検索用　未実装
//    public function search(Request $request)
//    {
////        dd($request->name);
//        $users = User::where([
////            ['name', 'like', "%". $request->name . "%"],
//            ['kana', 'like', "%". $request->name . "%"]
//        ])->paginate(5);
////        dd($users);
//
//        return view('users_list.index', compact('users'));
//    }

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
    public function show($user)
    {
        $user = User::find($user);
        if (is_null($user))
        {
            return redirect('users_list')->with(['status' => 'ユーザーを選択してください']);
        }

        return view('users_list.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::find($user);
        if (is_null($user))
        {
            return redirect('users_list')->with(['status' => 'ユーザーを選択してください']);
        }

        return view('users_list.edit', compact('user'));
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
        $inputs = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'kana' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'boolean'],
            'birthday' => ['required', 'date', 'max:10'],
            'address' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        User::where('id', $id)->update($inputs);

        return back()->with('status', '更新しました');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect(route('users_list.index'))->with('status', '会員番号'.$id.'を削除しました');

    }
}
