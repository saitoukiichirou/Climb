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
        return $this->belongsTo(Problem::class, 'problem_id')
            ->orderBy('dimension')->orderBy('grade');

    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
