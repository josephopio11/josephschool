<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_code',
        'name',
        'atukot_id',
        'stream_id',
        'teacher_id',
        'syllabus',
        'notify',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'atukot_id' => 'integer',
        'stream_id' => 'integer',
        'teacher_id' => 'integer',
        'notify' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function atukot(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
