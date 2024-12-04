@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add New Cuisine</h2>
    <form action="{{ route('cuisines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Cuisine Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Cuisine</button>
    </form>
</div>
@endsection
