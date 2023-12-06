<?php

namespace App\Models;

use App\Http\Enums\DoctorStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model
{
    use HasFactory, Translatable; // 2. To add translation methods


    protected $fillable = [
        'name',
        'appointments',
        'email',
        'password',
        'phone',
        'status',
        'section_id'
    ];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = [
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => DoctorStatusEnum::class,

    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(
            Appointment::class,
            'appointment_doctor',
            'doctor_id',
            'appointment_id'
        );
    }
}
