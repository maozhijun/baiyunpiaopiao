<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    protected $connection = "heitu";
    //

    public function getUrl()
    {
        return Storage::disk($this->disks)->url($this->path);
    }
}
