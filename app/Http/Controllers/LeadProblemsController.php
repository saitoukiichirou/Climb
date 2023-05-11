<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadProblem;

class LeadProblemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leadproblems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'grade' => ['required', 'string', 'max:10'],
            'hold_color' => ['required', 'max:10'],
            'top' => ['nullable', 'int', 'max:40'],
            'setter' => ['max:20'],
        ]);

        $lead_problem = new LeadProblem();
        $lead_problem->grade = $inputs ['grade'];
        $lead_problem->hold_color = $inputs ['hold_color'];
        $lead_problem->top = $inputs ['top'];
        $lead_problem->setter = $inputs ['setter'];
        $lead_problem->save();
        return back()->with('message', 'リード課題追加完了！');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
