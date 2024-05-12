<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductParameter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
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

    // Collect parameters for each sub-category, excluding parameters where value is null
    $subCategoriesWithParameters = [];
    foreach ($product->category->subCategories as $subCategory) {
        $params = $subCategory->parameters->map(function ($subCatParam) use ($product) {
            // Find the corresponding product parameter value
            $productParameter = $product->parameters->firstWhere('sub_category_parameter_id', $subCatParam->id);
            return [
                'id' => $subCatParam->id, 
                'name' => $subCatParam->scp_name,
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
            if($value){
                if ($parameter ) {
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








    public function search(Request $request)
    {

        // Start the query
        $query = Product::query();

        // Filter by category
        if ($request->has('categoryID')) {
            if(empty($request->input('categoryID'))){
                $categoryID = null;
            }else{
                $categoryID = $request->input('categoryID');
                $query->where('category_id', $categoryID);
                $category_name = Category::where('id', $categoryID)->first()->category_name;
            }
        }

        if ($request->has('search')) {
            if(empty($request->input('search'))){
                $search = null;
            }else{
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                      ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"]);
                });
            }
        }
            

        $minimumPrice = $request->input('minimum_price');
        if ($minimumPrice !== null) {
            $minimumPrice = (float) $minimumPrice;  // Cast to float to ensure numeric comparison
            $query->where('price', '>=', $minimumPrice);
        }

        $maximumPrice = $request->input('maximum_price');
        if ($maximumPrice !== null) {
            $maximumPrice = (float) $maximumPrice;  // Cast to float to ensure numeric comparison
            $query->where('price', '<=', $maximumPrice);
        }

         // Filter by brands if provided
        if ($request->has('brands')) {
            $brands = $request->input('brands');  // Brands is an array
            $query->whereHas('parameters', function ($q) use ($brands) {
                $q->whereIn('value', $brands);  // Adjust to use whereIn
            });
        }

        // Filter by colors if provided
        if ($request->has('colors')) {
            $colors = $request->input('colors');  // Colors is an array
            $query->whereHas('parameters', function ($q) use ($colors) {
                $q->whereIn('value', $colors);  // Adjust to use whereIn
            });
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');
            if ($sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            } else {{
                $query->orderBy('price', 'asc');
            }
            }
        }

        // Eager load the image relationship
        $query->with('images');

        // Pagination
        $products = $query->paginate(24); // Paginate so that only 24 items per page are returned



        //brands 
        $query = ProductParameter::join('products', 'product_parameters.product_id', '=', 'products.id')
            ->join('sub_category_parameters', 'product_parameters.sub_category_parameter_id', '=', 'sub_category_parameters.id')
            ->where('sub_category_parameters.scp_name', 'Značka')
            ->distinct();

        // Pridanie podmienky where len ak $categoryID nie je null
        if (isset($categoryID) && $categoryID !== null) {
            $query->where('products.category_id', '=', $categoryID);
        }

        $brands = $query->pluck('product_parameters.value')->toArray();


        $query = ProductParameter::join('products', 'product_parameters.product_id', '=', 'products.id')
            ->join('sub_category_parameters', 'product_parameters.sub_category_parameter_id', '=', 'sub_category_parameters.id')
            ->where('sub_category_parameters.scp_name', 'Farba')
            ->distinct();

        // Pridanie podmienky where len ak $categoryID nie je null
        if (isset($categoryID) && $categoryID !== null) {
            $query->where('products.category_id', '=', $categoryID);
        }

        $colors = $query->pluck('product_parameters.value')->toArray();
        // Return the view with the products collection
        return view('pages/searchResults', [
            'colors' => $colors,    
            'brands' => $brands,
            'minimumPrice' => $minimumPrice,
            'maximumPrice' => $maximumPrice,
            'products' => $products,
            'categoryID' => !empty($categoryID) ? $categoryID : null,
            'category_name' => !empty($categoryID) ? Category::find($categoryID)->category_name : 'Všetky kategórie',
            'search' => !empty($search) ? $search : null,
            'sort' => !empty($sort) ? $sort : null
        ]);
    }
}
