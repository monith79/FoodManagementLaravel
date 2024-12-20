<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuisine;

class CuisineController extends Controller
{
    public function index()
    {
        $cuisines = Cuisine::all();
        return view('cuisines.index', compact('cuisines'));
    }

    public function create()
    {
        return view('cuisines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'categories' => 'nullable',
            'price' => 'required|numeric|min:0',
            'spicy_level' => 'nullable',
            'dietary_option' => 'nullable',
            'is_available' => 'required|boolean',
        ]);

        // $cuisines = new Cuisine();
        // $cuisines->name = empty($request->name) ? null : $request->name;

        Cuisine::create([
            'name' => $request->name,
            'description' => $request->description,
            'categories' => $request->categories,
            'spicy_level' => $request->spicy_level,
            'dietary_option' => $request->dietary_option,
            'price' => $request->price,
        ]);
    
        
        return redirect()->route('cuisines.index')->with('success', 'Cuisine added successfully!');
    
    
    }

    public function edit(Cuisine $cuisine)
    {
        return view('cuisines.edit', compact('cuisine'));
    }

    public function update(Request $request, Cuisine $cuisine)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|max:255|unique:cuisines,name,' . $cuisine->id,
            'description' => 'nullable|string',
            'categories' => 'nullable|string',
            'price' => 'required|numeric|min:0',  // Validate price as numeric
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'spicy_level' => 'nullable', // Add validation for spicy level
            'dietary_option' => 'nullable', // Add validation for dietary option
            'is_available' => 'required|boolean', // Add validation for availability
        ]);

        // Update cuisine with request data
        $cuisine->update($request->all());
        // Explicitly update fields
        $cuisine->name = $request->input('name');
        $cuisine->description = $request->input('description');
        $cuisine->categories = $request->input('categories');
        $cuisine->price = $request->input('price');  // Explicitly update price
        $cuisine->spicy_level = $request ->input('spicy_level');
        $cuisine->dietary_option = $request -> input('dietary_option');
        $cuisine->is_available = $request -> input('is_available');
        // Check if there's an uploaded image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cuisines', 'public');
            $cuisine->image = $imagePath;
        }

        // Save the updated cuisine
        $cuisine->save();

        return redirect()->route('cuisines.index')->with('success', 'Cuisine updated successfully.');

    }

    public function destroy(Cuisine $cuisine)
    {
        $cuisine->delete();
        return redirect()->route('cuisines.index')->with('success', 'Cuisine deleted successfully.');
    }
}
