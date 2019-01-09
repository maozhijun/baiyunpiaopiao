<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function members(){
        return $this->hasMany(Account::class, 'group_id', 'id')->where('accounts.status', 1)->orderBy('accounts.created_at','desc');
    }

    public function membersCount() {
        return count($this->members);
    }

    public function customersCount() {
        $count = 0;
        foreach ($this->members as $member) {
            $count += count($member->customers);
        }
        return $count;
    }

    public static function allGroups() {
        return self::query()->where('status', 1)->orderBy('created_at')->get();
    }
}
