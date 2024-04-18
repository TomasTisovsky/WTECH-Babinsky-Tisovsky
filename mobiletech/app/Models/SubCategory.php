<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_category_parameters';

    protected $fillable = [
        'name',
        'sub_category_id',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
