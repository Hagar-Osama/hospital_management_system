<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 1. To specify package’s class you are using
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    use Translatable; // 2. To add translation methods

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name', 'description'];

    public function doctors() :HasMany
    {
        return $this->hasMany(Doctor::class, 'section_id');
    }
}
