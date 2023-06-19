<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function seller(){
        return $this->belongsTo('App\Models\Seller');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function getImage()
    {
        $image = $this->images()->where('type', 1)->first();
        if (!empty($image)) {
            return $image->name;
        }
        return '';
    }

}
