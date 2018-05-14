<?php

namespace App;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $q)
    {
        if($q)
        {
            $query->where('title', 'like', '%' .$q. '%')
                ->orWhere('body', 'like', '%' .$q. '%');
        }
    }
}
