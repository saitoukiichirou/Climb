<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'problem_id',
        'status'
    ];

    public function problem(){
//        return $this->belongsTo('App\Models\Problem');
        //順番を変えて取得する
        return $this->belongsTo(Problem::class, 'problem_id')
            ->orderBy('dimension')->orderBy('grade');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //完登した課題の個数
    public function achievementProblem($id, $grade): string
    {
        //$gradeの総数をカウントして分母に
        $denominator = Problem::where('grade', $grade)->count();

        //$gradeの$idユーザー完登数をカウントして分子に
        $numerator = Score::Join('problems','scores.problem_id', '=', 'problems.id')
            ->where([
                ['scores.user_id', $id],
                ['problems.grade', $grade]
            ])->count();

        //分子が0の時の Warning: Division by zero を回避
        if ($numerator == 0)
        {
            return '0/'.$denominator.'で0％';
        }

        //小数点以下切り捨てて%表示に誓える形に
        $percent = floor(($numerator / $denominator) * 100);

        return $numerator."/".$denominator."で".$percent."%";
    }
}
