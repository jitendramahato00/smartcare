<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Adminhospital extends Model
{
    protected $table = 'adminhospitals';

    // $fillable list bilkul theek hai, isko na badlein.
    protected $fillable = [
        'username', 'email', 'first_name', 'last_name', 'phone', 'gender',
        'date_of_birth', 'biography', 'clinic_name', 'clinic_address',
        'address_line_1', 'address_line_2', 'city', 'state', 'country',
        'postal_code', 'pricing_type', 'custom_price', 'services',
        'specialization', 'degree', 'college', 'year_of_completion',
        'hospital_name', 'experience_from', 'experience_to', 'designation',
        'award', 'award_year', 'memberships', 'registration_number',
        'registration_year', 'photo', 'status',
           'duty_start_time',
        'duty_end_time',
    ];

    /**
     * YEH SAHI KIYA HUA $casts ARRAY HAI
     * Hum sirf unhi cheezon ko 'array' banayenge jo database mein JSON jaisi dikhti hain.
     */
    protected $casts = [
        'services'      => 'array',
        'specialization'=> 'array',
        'memberships'   => 'array', // memberships ko array rehne dein
        'status'        => 'boolean',
        'date_of_birth' => 'date',
    ];
}