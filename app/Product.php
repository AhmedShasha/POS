<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;
    //
    public $translatedAttributes = ['name'];

    protected $fillable = [
        'name', 'description',
    ];

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
