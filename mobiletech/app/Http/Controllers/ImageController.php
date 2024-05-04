<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($imageID)
{
    $image = Image::find($imageID);
    if (!$image) {
        return response()->json(['success' => false, 'message' => 'Image not found.'], 404);
    }

    try {
        // Delete the image from the database
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    } catch (\Exception $e) {
        // If an error occurs during deletion
        return response()->json(['success' => false, 'message' => 'Failed to delete image.'], 500);
    }
    
}
}
