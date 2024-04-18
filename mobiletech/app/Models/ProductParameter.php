<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductParameter extends Model
{
    use HasFactory;

    protected $table = 'product_parameters';

    protected $fillable = [
        'product_id',
        'value',
        'sub_category_parameter_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function subCategoryParameter()
    {
        return $this->belongsTo(SubCategoryParameter::class);
    }
}
