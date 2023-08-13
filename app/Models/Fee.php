<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'atukot_id',
        'name',
        'description',
        'amount',
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
        'amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function atukot(): BelongsTo
    {
        return $this->belongsTo(Foreign::class);
    }
}
