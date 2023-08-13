<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HostelRoom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_number',
        'hostel_id',
        'capacity',
        'room_type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hostel_id' => 'integer',
        'room_type_id' => 'integer',
    ];

    public function hostel(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
