<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //カラム dimension,gradeそれぞれ昇順でソート
        $problems = Problem::orderBy('dimension')->orderBy('grade')->get();
        return view('problems.index', compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('problems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'dimension' => ['required', 'string', 'max:10'],
            'grade' => ['required', 'string', 'max:10'],
            'hold_color' => ['required', 'max:10'],
            'tape_form' => ['required', 'max:10'],
            'setter' => ['max:10'],
        ]);

        $problem = new Problem();
        $problem->dimension = $inputs ['dimension'];
        $problem->grade = $inputs ['grade'];
        $problem->hold_color = $inputs ['hold_color'];
        $problem->tape_form = $inputs ['tape_form'];
        $problem->setter = $inputs ['setter'];
        $problem->save();
        return back()->with('message', '課題追加完了！');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        return view('problems.show', compact('problem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem $problem)
    {
        return view('problems.edit', compact('problem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem)
    {
        $inputs = $request->validate([
            'dimension' => ['required', 'string', 'max:10'],
            'grade' => ['required', 'string', 'max:10'],
            'hold_color' => ['required', 'max:10'],
            'tape_form' => ['required', 'max:10'],
            'setter' => ['max:10'],
        ]);

        $problem->dimension = $inputs ['dimension'];
        $problem->grade = $inputs ['grade'];
        $problem->hold_color = $inputs ['hold_color'];
        $problem->tape_form = $inputs ['tape_form'];
        $problem->setter = $inputs ['setter'];
        $problem->save();
        return redirect()->route('problems.index')->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem)
    {
        //scoreテーブル上のレコードも削除する
        $problem->scores()->delete();
        $problem->delete();
        return redirect()->route('problems.index')->with('message', '削除しました');
    }
}
