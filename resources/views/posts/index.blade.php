@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>List of Foods</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-success">Add Food</a>
    </div>
    @if(Auth::user()->role == 'admin'||Auth::user()->role == 'user' )

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Region</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif
</div>
@endsection