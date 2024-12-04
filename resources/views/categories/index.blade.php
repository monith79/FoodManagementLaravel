@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h2>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Food Category</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)

            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Update/Edit</a>
                    
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
        
    </table>
    
</div>
@endsection