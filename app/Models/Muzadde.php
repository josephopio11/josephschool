<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Muzadde extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'salutation',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'occupation',
        'address',
        'phone',
        'alternate_phone',
        'email',
        'photo',
        'is_active',
        'last_active',
        'is_married',
        'spouse_id',
        'is_guardian',
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
        'date_of_birth' => 'date',
        'is_active' => 'boolean',
        'last_active' => 'datetime',
        'is_married' => 'boolean',
        'spouse_id' => 'integer',
        'is_guardian' => 'boolean',
        'can_login' => 'boolean',
    ];

    public function spouse(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
