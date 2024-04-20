<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::all();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addresses.create');
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->property1 = $request->input('property1');
        $address->property2 = $request->input('property2');
        // Set other properties as needed
        $address->save();
        
        return redirect()->route('addresses.index')->with('success', 'Address created successfully');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $address->property1 = $request->input('property1');
        $address->property2 = $request->input('property2');
        // Update other properties as needed
        $address->save();
        
        return redirect()->route('addresses.index')->with('success', 'Address updated successfully');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully');
    }
}
