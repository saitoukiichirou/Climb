<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadProblem extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade',
        'hold_color',
        'top',
        'setter',
    ];

}
