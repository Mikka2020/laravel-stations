<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_time',
        'end_time',
        'movie_id',
    ];
    protected $dates = [
        'start_time',
        'end_time',
    ];

    // スケジュールと映画はN対1の関係
    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
}