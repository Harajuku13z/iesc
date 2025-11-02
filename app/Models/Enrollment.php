<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'academic_year',
        'semester',
        'status',
    ];

    protected $casts = [
        'academic_year' => 'integer',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function getAverageGradeAttribute(): ?float
    {
        if ($this->grades->isEmpty()) {
            return null;
        }

        $totalWeighted = 0;
        $totalCoefficient = 0;

        foreach ($this->grades as $grade) {
            $normalizedScore = ($grade->score / $grade->max_score) * 20; // Normaliser sur 20
            $totalWeighted += $normalizedScore * $grade->coefficient;
            $totalCoefficient += $grade->coefficient;
        }

        return $totalCoefficient > 0 ? round($totalWeighted / $totalCoefficient, 2) : null;
    }

    public function getAttendanceRateAttribute(): float
    {
        $total = $this->attendances->count();
        if ($total === 0) {
            return 100;
        }

        $present = $this->attendances->whereIn('status', ['present', 'late'])->count();
        return round(($present / $total) * 100, 2);
    }
}

