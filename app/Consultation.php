<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'patient_id', 'provider_id', 'consultation_date', 'consultation_time', 'total_amount', 'payment_method', 'status', 'admin_notes'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
}