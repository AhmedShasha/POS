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

    protected $appends = ['image_path', 'profit_percent'];

    public function getImagePathAttribute()
    {

        return asset('uploads/products_images/' . $this->image);

    }

    public function getProfitPercentAttribute(){

        $profit = $this->sale_price - $this->purchase_price;

        $profit_percent = $profit * 100  / $this->purchase_price;

        return number_format($profit_percent);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
