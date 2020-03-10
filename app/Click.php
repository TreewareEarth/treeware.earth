<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
