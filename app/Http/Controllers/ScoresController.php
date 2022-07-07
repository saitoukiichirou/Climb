<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Problem;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $problems = Problem::orderBy('dimension')->orderBy('grade')->get();

//        $problems = Problem::select();

        /////////////////////////
        /// ①　完登したらレコードを作成されるパターン
        /////////////////////////

        $scores = Score::where('user_id', $user_id)->get();
//        dd($scores);

        return view('scores.index', compact('problems', 'scores'));



        /////////////////////////
        /// ②　課題数の分だけレコードを作成するパターン
        /////////////////////////

        foreach ($problems as $problem) {
            //課題の更新時を想定,$problem_idが新しく追加になっていた場合
            //ログイン中の$user_idでの$problem_idがなければ追加する
            if (is_null(Score::where([['user_id', $user_id], ['problem_id', $problem->id]])->first())) {
                $score = new Score();
                $score->user_id = $user_id;
                $score->problem_id = $problem->id;
                $score->status = 0;
                $score->save();
                print $score;
            }
        }

        //ログインユーザのレコードを取得
        $scores = Score::where('user_id', $user_id)->get();
        //リレーション先の任意のカラムでソート
        $scores = $scores->sortBy([
            ['problem.dimension', 'asc'],
            ['problem.grade', 'asc']
        ]);

        /////////////////////////
        /// 課題数の分だけレコードを作成するパターン ここまで
        /////////////////////////


        return view('scores.index', compact('scores'));



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
        //
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
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $problem_id = $request->problem_id; //2.投稿idの取得
        $already_liked = Score::where('user_id', $user_id)->where('problem_id', $problem_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $score = new Score(); //4.Likeクラスのインスタンスを作成
            $score->user_id = $user_id; //Likeインスタンスにreview_id,user_idをセット
            $score->problem_id = $problem_id;
            $score->status = 0;
            $score->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Score::where('problem_id', $problem_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
//        $review_likes_count = Problem::withCount('user_id')->findOrFail($problem_id)->problems_count;
//        $param = [
//            'review_likes_count' => $review_likes_count,
//        ];
//        return response()->json($param); //6.JSONデータをjQueryに返す
    }
}
