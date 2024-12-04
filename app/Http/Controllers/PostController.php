<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use App\Models\Post ;
use App\Models\Category ;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id ;
        $posts = Post::all() ;
        return view('posts.index', ['posts'=>$posts]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all() ;
        return view('posts.create', ['categories' => $categories]) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request->all()) ;
        $request -> validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
        ]);

        $user_id = Auth::user()->id ;
        $category_id = $request->category_id ;

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'user_id' => $user_id ,
            'category_id' => $category_id
        ]);

        return redirect() -> route('posts.index')
        -> with('success', 'Post created successfully.') ;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id) ;
        return redirect() -> route('posts.index')
        -> with('success', 'Post deleted successfully.') ;
    }
}
