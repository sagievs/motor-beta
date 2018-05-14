<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Guarded extends Eloquent
{
    
    protected $guarded = ['updated_at'];

}
