<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'url', 'order'];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
