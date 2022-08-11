<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Problem;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user_id = Auth::user()->id;
        $problems = Problem::orderBy('dimension')->orderBy('grade')->get();

        return view('scores.index', compact('problems'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $problems = Problem::margeProblems();

        return view('scores.show', compact('problems', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function success(Request $request)
    {
        $user_id = Auth::user()->id;
        $problem_id = $request->problem_id; //2.投稿idの取得
        $already_liked = Score::where('user_id', $user_id)->where('problem_id', $problem_id)->first();

        if (!$already_liked) { //もしこのユーザーがこのproblemをまだ完登してなかったら
            //Scoreクラスのインスタンスを作成
            $score = new Score();
            //Scoreインスタンスにproblem_id,user_idをセット
            $score->user_id = $user_id;
            $score->problem_id = $problem_id;
            $score->status = 0;
            $score->save();
        } else {
            //もしこのユーザーがこの$problemを既に完登してたらdelete
            Score::where('problem_id', $problem_id)->where('user_id', $user_id)->delete();
        }
    }
}
