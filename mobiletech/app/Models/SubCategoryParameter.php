<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryParameter extends Model
{
    use HasFactory;


    protected $table = 'sub_category_parameters';

    protected $fillable = [
        'scp_name',
        'sub_category_id',
        'options',
    ];

    protected $casts = [
        'options' => 'array',  // This will auto-cast JSON to array and vice versa
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
