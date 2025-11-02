<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'teacher_id',
        'code',
        'name',
        'description',
        'credits',
        'hours_per_week',
        'semester',
        'room',
        'schedule',
        'is_active',
    ];

    protected $casts = [
        'schedule' => 'array',
        'is_active' => 'boolean',
        'credits' => 'integer',
        'hours_per_week' => 'integer',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }
}

