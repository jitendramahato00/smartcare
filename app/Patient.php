<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone'
    ];

    /**
     * Get the consultations for the patient.
     */
    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
}