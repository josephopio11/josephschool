<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MuzaddeStudent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'muzadde_id',
        'student_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'muzadde_id' => 'integer',
        'student_id' => 'integer',
    ];

    public function muzadde(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
