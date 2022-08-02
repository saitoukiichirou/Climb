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

    //課題をgrade毎かつdimension毎で多次元配列に格納
    public function getDimension($grade)
    {
        $problem_name = array(
            $grade => array(
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
            (Problem::getDimension('00')),
            (Problem::getDimension('01')),
            (Problem::getDimension('02')),
            (Problem::getDimension('03')),
            (Problem::getDimension('04')),
            (Problem::getDimension('05')),
            (Problem::getDimension('06')),
            (Problem::getDimension('07')),
            (Problem::getDimension('08')),
            (Problem::getDimension('09')),
            (Problem::getDimension('10')),
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
