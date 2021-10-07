<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

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
