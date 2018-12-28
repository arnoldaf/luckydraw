<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyDeclareNumber extends Model
{
    protected $table= 'daily_declare_number';

     protected $fillable = [
        'game_id', 'number', 'declare_date'
    ];
}
