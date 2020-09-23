<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function wish()
    {
        return $this->belongsTo(Wish::class);
    }
}
