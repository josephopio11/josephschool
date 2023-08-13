<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
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
        'address',
        'phone',
        'alternate_phone',
        'email',
        'photo',
        'is_active',
        'last_active',
        'staff_role_id',
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
        'staff_role_id' => 'integer',
    ];

    public function staffRole(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
