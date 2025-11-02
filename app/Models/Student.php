<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'student_number',
        'first_name',
        'last_name',
        'date_of_birth',
        'phone',
        'address',
        'city',
        'country',
        'emergency_contact_name',
        'emergency_contact_phone',
        'photo',
        'status',
        'enrollment_year',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'enrollment_year' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            if (empty($student->student_number)) {
                $student->student_number = 'STU' . date('Y') . str_pad(Student::max('id') + 1, 5, '0', STR_PAD_LEFT);
            }
        });
    }
}

