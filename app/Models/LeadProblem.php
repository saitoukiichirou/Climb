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

    public function getLeadProblem()
    {
        return LeadProblem::orderBy('grade')->get();
    }

    //値をリードのグレードに変換
    public function convProblemGrade($param)
    {
        if ($param == "00"){
            return '13d';
        }elseif ($param == "01"){
            return '13c';
        }elseif ($param == "02"){
            return '13b';
        }elseif ($param == "03"){
            return '13a';
        }elseif ($param == "04"){
            return '12d';
        }elseif ($param == "05"){
            return '12c';
        }elseif ($param == "06"){
            return '12b';
        }elseif ($param == "07"){
            return '12a';
        }elseif ($param == "08"){
            return '11d';
        }elseif ($param == "09"){
            return '11c';
        }elseif ($param == "10"){
            return '11b';
        }elseif ($param == "11"){
            return '11a';
        }elseif ($param == "12"){
            return '10d';
        }elseif ($param == "13"){
            return '10c';
        }elseif ($param == "14"){
            return '10b';
        }elseif ($param == "15"){
            return '10a';
        }elseif ($param == "16"){
            return '5.9';
        }else{
            return '不明';
        }
    }
}
