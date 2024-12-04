<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category ;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all() ;
        return view('categories.index', ['categories'=>$categories]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|max:255'
        ]);
        
        Category::create([
            'name' => $request->name
        ]);

        return redirect() -> route('categories.index')
        -> with('success', 'Category created successfully.') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id); // Find the category by ID or throw an error
        return view('categories.edit', compact('category')); // Pass the category to the edit view
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validate the input
        ]);
    
        $category = Category::findOrFail($id); // Find the category by ID
        $category->name = $request->input('name'); // Update the category name
        $category->save(); // Save the changes
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id) ;
        return redirect() -> route('categories.index')
        -> with('success', 'Category deleted successfully.') ;
    }

    
}
