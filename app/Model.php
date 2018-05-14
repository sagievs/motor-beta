<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = [];

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
