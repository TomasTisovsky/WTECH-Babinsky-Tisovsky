<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
     public function show(Product $product)
    {
        // Fetch all categories
        $categories = Category::all();
        $category = $product->category; // Accesses the related category
        
        $subCategories = $category->subCategories;

        // Create an associative array where each key is a subcategory and each value is an array of parameters for that subcategory
        $subCategoriesWithParameters = $subCategories->mapWithKeys(function ($subCategory) {
            return [$subCategory->sub_category_name => $subCategory->parameters->map(function ($parameter) {
                return [
                    'name' => $parameter->name,
                    'options' => $parameter->options // Assuming 'options' is a relationship or attribute on the Parameter model
                ];
            })];
        });

        return view('pages/adminPanelProductDetail', compact('categories', 'subCategoriesWithParameters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
