<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Searchable;

    protected $guarded = [];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['clicks'] = (int) $this->clicks()->count();

        return $array;
    }

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    public function searchableAs()
    {
        return config('scout.prefix') . 'package_name';
    }
}
