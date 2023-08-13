<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassroomBooking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classroom_id',
        'atukot_id',
        'date',
        'start_time',
        'end_time',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'classroom_id' => 'integer',
        'atukot_id' => 'integer',
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function atukot(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
