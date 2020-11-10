<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class);
    }
}
