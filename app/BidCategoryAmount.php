<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidCategoryAmount extends Model
{
    protected $table= 'bid_category_amount';
    protected $fillable = [
       'game_id', 'bid_category_id', 'multiply'
   ];
}
