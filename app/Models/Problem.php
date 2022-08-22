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

    protected $fillable = [
        'dimension',
        'grade',
        'hold_color',
        'tape_form',
        'setter',
    ];

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
        return [
            [
                'A' => Problem::where([['grade', $grade], ['dimension', 'A']])->get(),
                'B' => Problem::where([['grade', $grade], ['dimension', 'B']])->get(),
                'C' => Problem::where([['grade', $grade], ['dimension', 'C']])->get(),
                'D' => Problem::where([['grade', $grade], ['dimension', 'D']])->get(),
            ],
        ];
    }

    public function margeProblems()
    {
        $marge_grades = [];
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

    //値を課題のグレードに変換
    public function convProblemGrade($param)
    {
        if ($param == "00"){
            return '3段';
        }elseif ($param == "01"){
            return '2段';
        }elseif ($param == "02"){
            return '初段';
        }elseif ($param == "03"){
            return '1級';
        }elseif ($param == "04"){
            return '2級';
        }elseif ($param == "05"){
            return '3級';
        }elseif ($param == "06"){
            return '4級';
        }elseif ($param == "07"){
            return '5級';
        }elseif ($param == "08"){
            return '6級';
        }elseif ($param == "09"){
            return '7級';
        }elseif ($param == "10"){
            return '8級';
        }elseif ($param == "21"){
            return 'スクール';
        }elseif ($param == "22"){
            return 'エクストラ';
        }else{
            return '不明';
        }
    }

    public function getStdProblem()
    {
        //通常課題のみ取得
        //カラム dimension,gradeそれぞれ昇順でソート
        return Problem::wherebetween('grade', [00, 10])->orderBy('dimension')->orderBy('grade')->get();
    }

    public function getSclProblem()
    {
        //スクール課題のみ取得
        //カラム dimension,gradeそれぞれ昇順でソート
        return Problem::wherebetween('grade', [21, 22])->orderBy('dimension')->orderBy('grade')->get();
    }
}
