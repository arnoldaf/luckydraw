<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBid extends Model
{
    protected $table = 'user_bid';
    
    public function saveMultiple($userBids) {
        try {
            return $this->insert($userBids);
        } catch (Exception $ex) {
            return $ex->getErrorMessage();
        } 
    }
}
