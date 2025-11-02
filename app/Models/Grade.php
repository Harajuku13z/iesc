<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'type',
        'name',
        'score',
        'max_score',
        'coefficient',
        'comment',
        'graded_at',
    ];

    protected $casts = [
        'score' => 'decimal:2',
        'max_score' => 'decimal:2',
        'coefficient' => 'decimal:2',
        'graded_at' => 'date',
    ];

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function getPercentageAttribute(): float
    {
        return round(($this->score / $this->max_score) * 100, 2);
    }

    public function getNormalizedScoreAttribute(): float
    {
        return round(($this->score / $this->max_score) * 20, 2);
    }
}

