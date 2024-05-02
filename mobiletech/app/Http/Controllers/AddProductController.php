<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AddProductController extends Controller
{
    public function index($categoryName)
    {
        $categories = Category::all();

        // Retrieve the category by name
        $category = Category::with('subCategories')  // Use the exact relationship method name
                 ->where('category_name', $categoryName)  // Ensure 'category_name' is the correct column name
                 ->first();

        if (!$category) {
            // Handle the case where the category does not exist
            abort(404, 'Category not found.');
        }
        
        // Retrieve all subcategories of the retrieved category
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

        // Pass the data to Syour view
        return view('pages/adminPanelAddProduct', compact('categories','category', 'subCategoriesWithParameters'));

    }

    public function store(Request $request)
    {
        // Validate the request...

        // Create a new product instance...
        $product = new Product($request->all());
        
        // Save the product to the database...
        $product->save();

        // Redirect the user or return a response...
        return redirect()->route('somewhere')->with('success', 'Product added successfully.');
    }

}
