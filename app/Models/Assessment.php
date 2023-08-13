<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assessment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'assessment_type_id',
        'atukot_id',
        'assessment_date',
        'stream_id',
        'session_id',
        'pass_mark',
        'full_mark',
        'start_date',
        'end_date',
        'comments',
        'assessment_file',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'assessment_type_id' => 'integer',
        'atukot_id' => 'integer',
        'assessment_date' => 'date',
        'stream_id' => 'integer',
        'session_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function assessmentType(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function atukot(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
