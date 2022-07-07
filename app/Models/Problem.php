<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    public function scores(){
        return $this->hasMany('App\Models\Score');
    }
    public function isLikedBy($user): bool {
        return Score::where('user_id', $user->id)->where('problem_id', $this->id)->first() !==null;
    }

    protected $fillable = [
        'dimension',
        'grade',
        'hold_color',
        'tape_form',
        'setter',
    ];
}
