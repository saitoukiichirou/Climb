<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'price_id',
    ];
}
