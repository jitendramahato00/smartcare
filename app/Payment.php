<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consultation_id', 'amount', 'status', 'transaction_id', 'payment_gateway_response'
    ];

    /**
     * Get the consultation that owns the payment.
     */
    public function consultation()
    {
        return $this->belongsTo('App\Consultation');
    }
}