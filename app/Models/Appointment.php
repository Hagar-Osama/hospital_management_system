<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Appointment extends Model
{
    use HasFactory, Translatable; // 2. To add translation methods;

    protected $fillable = [
        'day'
    ];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = [
        'day',
    ];

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(
            Doctor::class,
            'appointment_table',
            'appointment_id',
            'doctor_id'
        );
    }
}
