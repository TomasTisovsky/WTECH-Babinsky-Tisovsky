<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';


    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'category_id',
    ];


     // Many-to-One relationship with Category
     public function category()
     {
         return $this->belongsTo(Category::class);
     }

    //parameters relationship   
    public function parameters()
    {
        return $this->hasMany(ProductParameter::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
