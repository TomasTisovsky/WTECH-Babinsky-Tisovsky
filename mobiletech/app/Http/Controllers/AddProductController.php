<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request,$category)
    {   
        $product = new Product([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock_quantity' => $request->stock_quantity,
            'category_id' => $category->id,
        ]);
        $product->save();

        // Handling multiple parameters
        if($request->input('parameters.name')) {
            foreach ($request->input('parameters.name') as $index => $name) {
                if ($name !== null) {
                    $product->parameters()->create([
                        'name' => $name,
                        'value' => $request->input('parameters.value')[$index],
                    ]);
                }
            }
        }


         // Handling multiple images upload
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/resources/images/', $name);  
                $product->images()->create(['name_hash' => Hash::make('/resources/images/'.$name)]);
            }
        }

        $product->save();

        return redirect()->route('pages/adminPanel')->with('success', 'Product added successfully.');
     
    }

}
