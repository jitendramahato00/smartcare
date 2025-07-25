<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminhospital extends Model
{
    protected $table = 'adminhospitals';

    protected $fillable = [
        'username', 'email', 'first_name', 'last_name', 'phone', 'gender',
        'date_of_birth', 'biography', 'clinic_name', 'clinic_address',
        'address_line_1', 'address_line_2', 'city', 'state', 'country',
        'postal_code', 'pricing_type', 'custom_price', 'services', // services ab array cast nahi hai
        'specialization', // specialization ab array cast nahi hai
        'degree', 'college', 'year_of_completion',
        'hospital_name', 'experience_from', 'experience_to', 'designation',
        'award', 'award_year', 'memberships', // memberships ab array cast nahi hai
        'registration_number',
        'registration_year', 'photo', 'status',
        'duty_start_time',
        'duty_end_time',
    ];

    /**
     * Maine 'services', 'specialization', aur 'memberships' se 'array' casting hata di hai.
     * Ab Laravel in fields ko database se strings ke roop mein hi retrieve karega.
     * agar aap in fields ko database mein JSON string ke roop mein store kar rahe hain
     * aur unhe PHP arrays ke roop mein istemal karna chahte hain, toh aapko
     * 'array' casting ko wapas add karna hoga aur blade mein implode() ka istemal karna hoga.
     */
    protected $casts = [
        // 'services'      => 'array', // Removed array casting
        // 'specialization'=> 'array', // Removed array casting
        // 'memberships'   => 'array', // Removed array casting
        'status'        => 'boolean',
        'date_of_birth' => 'date',
    ];
}
