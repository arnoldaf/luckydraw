<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'city','dob', 'country','pin','user_account','password','address', 'phone', 'role', 'area_manager', 'comission', 'patti', 'active', 'role_id','parent_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * To get record by field name
     * @param $fieldName
     * @param $fieldValue
     * @return Array
     */
    public function findByFieldName($fieldName, $fieldValue) {
        return $this::where($fieldName, $fieldValue)->get()->toArray();
    }

    /**
     * To check fromUserId and toUserId are direct downline or direct upline
     * @param $fromUserId
     * @param $toUserId
     * @return Array
     */
    public function checkDirectUplineOrDownline($fromUserId, $toUserId) {
        return $this::where(['id' => $fromUserId, 'parent_id' => $toUserId])
            ->orWhere('id', $toUserId)
            ->where('parent_id', $fromUserId)
            ->get()
            ->toArray();
    }

    /**
     * To check both id on same level
     * @param $fromUserId
     * @param $toUserId
     * @return bool
     */
    public function isOnSameLevel($fromUserId, $toUserId) {
        $parentIdOfFromUser = $this::select('parent_id')->where('id', $fromUserId)->first();
        $parentIdOfToUser = $this::select('parent_id')->where('id', $toUserId)->first();
        if ($parentIdOfFromUser == $parentIdOfToUser) {
            return true;
        }

        return false;
    }
}
