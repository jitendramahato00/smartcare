<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'logo'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
