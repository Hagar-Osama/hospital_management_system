<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PackageOffer extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'original_price',
        'discount_price',
        'discount_value',
        'tax_rate',
        'total_price',
        'name',
        'notes'
    ];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = [
        'name',
        'notes'
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(
            Service::class,
            'package_service',
            'package_offer_id',
            'service_id'
        );
    }
}
