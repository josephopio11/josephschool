<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id',
        'teacher_id',
        'atukot_id',
        'name',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subject_id' => 'integer',
        'teacher_id' => 'integer',
        'atukot_id' => 'integer',
        'is_active' => 'boolean',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }

    public function atukot(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
