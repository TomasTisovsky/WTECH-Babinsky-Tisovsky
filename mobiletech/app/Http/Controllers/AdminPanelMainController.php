<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminPanelMainController extends Controller
{
    public function index()
    {
        
    }


    public function showProducts($categoryName = 'Mobilné telefóny')
    {
        $selectedCategory = Category::where('category_name', $categoryName)->first();
        $categories = Category::all();
        $products = $selectedCategory? $selectedCategory->products : collect();

        return view('pages/adminPanel', compact('categories', 'selectedCategory','products'));
    }

}   