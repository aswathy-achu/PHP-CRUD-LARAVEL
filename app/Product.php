<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_details';
    protected $fillable = ['name', 'description', 'price', 'quantity','category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
