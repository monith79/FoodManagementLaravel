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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);
    
        Cuisine::create([
            'name' => $request->name,
            'description' => $request->description,
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
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',  // Validate price as numeric
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        // Explicitly update fields
        $cuisine->name = $request->input('name');
        $cuisine->description = $request->input('description');
        $cuisine->price = $request->input('price');  // Explicitly update price

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
