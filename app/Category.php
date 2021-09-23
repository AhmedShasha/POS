<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use phpDocumentor\Reflection\Types\This;

class Category extends Model
{
    use Translatable;
    //
    public $translatedAttributes = ['name'];

    protected $fillable = [
        'name',
    ];

    protected $guarded = [];

    public function products () {
        return $this->hasMany(Product::class);
    }

}
