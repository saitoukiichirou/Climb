<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public function prices(){
        return $this->belongsToMany('App\Models\price');
    }

    protected $dates = [
        'date',
    ];
}


