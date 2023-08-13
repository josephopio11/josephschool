<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admission_number',
        'admission_date',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'address',
        'phone',
        'alternate_phone',
        'email',
        'photo',
        'is_active',
        'last_active',
        'previous_school',
        'has_sibling',
        'can_login',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'admission_date' => 'date',
        'date_of_birth' => 'date',
        'is_active' => 'boolean',
        'last_active' => 'datetime',
        'has_sibling' => 'boolean',
        'can_login' => 'boolean',
    ];
}
