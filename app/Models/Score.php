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

    public function countSuccess($user)
    {
        $denominator = Problem::where('grade','03')->count();//例：1Qの総数を取得
        $numerator = Score::where('user_id', $user)->with('problem')->get();

        $numerator = Score::where('user_id', $user)->with(['problem' => function ($query){
            $query->where('grade', '03');
        }])->get();

        return $denominator;
//        .$numerator;
    }
}
