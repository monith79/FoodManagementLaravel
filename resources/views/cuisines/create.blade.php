

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Cuisine</h2>
    <form action="{{ route('cuisines.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="categories">Category</label>
            <input type="text" name="categories" id="categories" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="spicy_level">Spicy Level</label>
            <select name="spicy_level" id="spicy_level" class="form-control">
                <option value="Mild">Mild</option>
                <option value="Medium">Medium</option>
                <option value="Hot">Hot</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dietary_option">Dietary Option</label>
            <select name="dietary_option" id="dietary_option" class="form-control">
                <option value="Vegan">Vegan</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Gluten-Free">Gluten-Free</option>
            </select>
        </div>
        <div class="form-group">
            <label for="is_available">Available</label>
            <select name="is_available" id="is_available" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Cuisine</button>
    </form>
</div>
@endsection

