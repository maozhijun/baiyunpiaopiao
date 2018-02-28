<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AppDevice extends Model
{
    //
    protected $primaryKey = 'udid';
    protected $keyType = 'string';

    public $connection = "heitu";
}
