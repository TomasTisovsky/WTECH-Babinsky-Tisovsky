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
        $category = Category::with('subCategories')  
                 ->where('category_name', $categoryName)  
                 ->first();

        if (!$category) {
            // Handle the case where the category does not exist
            abort(404, 'Category not found.');
        }
        
        // Retrieve all subcategories of the retrieved category
        $subCategories = $category->subCategories;

        $subCategoriesWithParameters = $subCategories->mapWithKeys(function ($subCategory) {
            return [
                $subCategory->sub_category_name => $subCategory->parameters->toArray()
            ];
        });

        return view('pages/adminPanelAddProduct', compact('categories','category', 'subCategoriesWithParameters'));

    }

    public function store(Request $request,$category)
    {   
        $product = new Product([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock_quantity' => $request->quantity,
            'category_id' => $category,
        ]);
        $product->save();

        
        if($request->has('parameters')) {
            foreach ($request->input('parameters') as $parameterId => $value) {
                if ($value !== null) {
                    $product->parameters()->create([
                        'sub_category_parameter_id' => $parameterId,
                        'value' => $value
                    ]);
                }
            }
        }

        $categoryName = Category::find($category)->category_name;

        // Handling multiple images upload
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/resources/images/', $name);  
                $product->images()->create(['name' => $name]);
            }
        }

        $product->save();

        return redirect()->route('admin.products.show')->with('categoryName', $categoryName)->with('success', 'Product added successfully.');
     
    }

}
