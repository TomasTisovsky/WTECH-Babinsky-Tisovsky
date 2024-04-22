<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

   
    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id',
        'sub_category_name',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function parameters()
{
    return $this->hasMany(SubCategoryParameter::class);
}
}
