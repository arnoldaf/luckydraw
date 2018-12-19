<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table= 'games';
    
    public function getActiveGames() {
        return $this::where('status', 1)->get()->toArray();
    }
}
