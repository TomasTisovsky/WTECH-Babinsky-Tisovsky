<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
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

        $product->load('category.subCategories.parameters');

        // Collect parameters for each sub-category
        $subCategoriesWithParameters = [];
        foreach ($product->category->subCategories as $subCategory) {
            $params = $subCategory->parameters->map(function ($subCatParam) use ($product) {
                // Find the corresponding product parameter value
                $productParameter = $product->parameters->firstWhere('sub_category_parameter_id', $subCatParam->id);
    
                return [
                    'name' => $subCatParam->name,
                    'value' => $productParameter ? $productParameter->value : null
                ];
            });
    
            $subCategoriesWithParameters[$subCategory->sub_category_name] = $params;
        }

    

       // Prepare data to be sent to the view
        return view('pages/adminPanelProductDetail', [
            'product' => $product, // Send the product details
            'categories' => $categories, // Send all categories if needed for a dropdown or list
            'category' => $category, // Send the specific category of the product
            'subCategoriesWithParameters' => $subCategoriesWithParameters, // Send structured subcategories and parameters
            'images' => $product->images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Fetch all categories
        $categories = Category::all();
        $category = $product->category; // Accesses the related category
        
        $subCategories = $category->subCategories;

        $product->load('category.subCategories.parameters');

        // Collect parameters for each sub-category
        $subCategoriesWithParameters = [];
        foreach ($product->category->subCategories as $subCategory) {
            $params = $subCategory->parameters->map(function ($subCatParam) use ($product) {
                // Find the corresponding product parameter value
                $productParameter = $product->parameters->firstWhere('sub_category_parameter_id', $subCatParam->id);
    
                return [
                    'id' => $subCatParam->id, 
                    'name' => $subCatParam->name,
                    'value' => $productParameter ? $productParameter->value : null,
                    'options' => $subCatParam->options 
                ];
            });
    
            $subCategoriesWithParameters[$subCategory->sub_category_name] = $params;
        }

    

       // Prepare data to be sent to the view
        return view('pages/adminPanelEditProduct', [
            'product' => $product, // Send the product details
            'categories' => $categories, // Send all categories if needed for a dropdown or list
            'category' => $category, // Send the specific category of the product
            'subCategoriesWithParameters' => $subCategoriesWithParameters, // Send structured subcategories and parameters
            'images' => $product->images
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
         // Update product fields
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->stock_quantity = $request->quantity;
    $product->category_id = $product->category_id;
    $product->save();

    // Update parameters, you might want to handle it differently if you need to add/update/delete
    if ($request->has('parameters')) {
        foreach ($request->input('parameters') as $parameterId => $value) {
            $parameter = $product->parameters()->where('sub_category_parameter_id', $parameterId)->first();
            if ($parameter) {
                // Update existing parameter
                $parameter->update(['value' => $value]);
            } else {
                // Or create a new parameter if it does not exist
                $product->parameters()->create([
                    'sub_category_parameter_id' => $parameterId,
                    'value' => $value
                ]);
            }
        }
    }

    // Handling images, if you need to add new images
    if ($request->hasfile('images')) {
        foreach ($request->file('images') as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/resources/images/', $name);  
            $product->images()->create(['image_name' => $name]);
        }
    }

    $deletedImages = $request->input('deleted_images');

    foreach ($deletedImages as $imageId) {
        if (!empty($imageId)) { // Check if there's an ID to process
            $image = Image::find($imageId);
            if ($image) {
                $image->delete(); // Delete the image from the database
            }
        }
    }

    return redirect()->route('admin.products.show')->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->load('category');
        $categoryName = $product->category->category_name;

        // Delete the product
        $product->delete();

        // Redirect to a specific route with a success message
        return redirect()->route('admin.products.show')
                 ->with('success', 'Product deleted successfully.');
    }
}
