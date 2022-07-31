<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    public function scores()
    {
        return $this->hasMany('App\Models\Score');
    }

    public function isLikedBy($user): bool
    {
        return Score::where([
                ['user_id', $user->id],
                ['problem_id', $this->id]
            ])->first() !== null;
    }

    //グレードごとの課題数と$userの完登数をintで返す
    public function isHowMany($grade): int
    {
        return Problem::where('grade', $grade)->count();

//        return Score::where('user_id', $user->id)
//            ->first()->get();

//            ->where('problem.grade', '00')
//            ->count();//gradeごとの完登数を数字で返したい
    }
    public function problemPerSuccess($grade, $user)
    {
        //$userが落とした課題とその課題の情報を取り出す
//        $score = Score::where('user_id', $user)->with('problem')->get();
//        $score->

        $pps = array(
        'problem' => Problem::where('grade', $grade)->count(),
        );
//        print_r($score);
        return $pps;
    }

    //課題をgrade毎かつdimension毎で多次元配列に格納
    public function getDimension($grade, $grade_name)
    {
        $problem_name = array(
            $grade_name => array(
                'A' => Problem::where([['grade', $grade], ['dimension', 'A']])->get(),
                'B' => Problem::where([['grade', $grade], ['dimension', 'B']])->get(),
                'C' => Problem::where([['grade', $grade], ['dimension', 'C']])->get(),
                'D' => Problem::where([['grade', $grade], ['dimension', 'D']])->get()
            ),
        );
        return $problem_name;
    }

    public function margeProblems()
    {
        $marge_grades = array();
        $marge_grades += array_merge($marge_grades,
            (Problem::getDimension('00', '3D')),
            (Problem::getDimension('01', '2D')),
            (Problem::getDimension('02', '1D')),
            (Problem::getDimension('03', '1Q')),
            (Problem::getDimension('04', '2Q')),
            (Problem::getDimension('05', '3Q')),
            (Problem::getDimension('06', '4Q')),
            (Problem::getDimension('07', '5Q')),
            (Problem::getDimension('08', '6Q')),
            (Problem::getDimension('09', '7Q')),
            (Problem::getDimension('10', '8Q')),
        );
        return $marge_grades;
    }

    public function getProblem($grade, $dimension)
    {
        return Problem::where([['grade', $grade], ['dimension', $dimension]])->get();
    }

    protected $fillable = [
        'dimension',
        'grade',
        'hold_color',
        'tape_form',
        'setter',
    ];
}
