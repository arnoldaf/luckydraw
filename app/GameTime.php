<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameTime extends Model
{
  protected $fillable = [
     'game_id', 'game_date', 'start_time', 'end_time'
 ];
}
