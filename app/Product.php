<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;
    //
    public $translatedAttributes = ['name', 'description'];

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {

        return asset('uploads/products_images/' . $this->image);

    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
