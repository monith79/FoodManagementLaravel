@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cuisines</h2>
    <a href="{{ route('cuisines.create') }}" class="btn btn-success">Add Cuisine</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Categories</th>
                <th>Description</th>
                <th>Price</th> <!-- Add Price column here -->
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($cuisines as $cuisine)
            <tr>
                <td>{{ $cuisine->id }}</td>
                <td>{{ $cuisine->name }}</td>
                <td>{{ $cuisine->categories }}</td>
                <td>{{ $cuisine->description }}</td>
                <td>${{ number_format($cuisine->price, 2) }}</td>
                <td>
                    <a href="{{ route('cuisines.edit', $cuisine->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('cuisines.destroy', $cuisine->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

                    <!-- Add to Cart Button -->
                    <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cuisine->id }}">
                        <input type="hidden" name="name" value="{{ $cuisine->name }}">
                        <input type="hidden" name="price" value="{{ $cuisine->price }}">
                        <input type="hidden" name="quantity" value="1">
                        <button class="btn btn-primary btn-sm">Add to Cart</button>
                    </form>

                    
                </td>
            </tr>
            @endforeach
        </tbody>




    </table>

    <a href="{{ route('cart.index') }}" class="btn btn-outline-info">Check Cart</a>
</div>

@endsection
