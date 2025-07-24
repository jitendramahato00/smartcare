<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'specialization', 'location', 'consulting_fee', 'booking_fee', 'image_path'
    ];

    /**
     * Get the consultations for the provider.
     */
    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
}