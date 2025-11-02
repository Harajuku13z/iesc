<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AdmissionApplication extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'program_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'birth_date',
        'status',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
