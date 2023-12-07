<?php

namespace App\Models;

use App\Http\Enums\ServiceStatusEnum;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
    ];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = [
        'name',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => ServiceStatusEnum::class,

    ];
}
