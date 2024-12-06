<!-- resources/views/cuisines/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Cuisine</h2>
    <a href="{{ route('cuisines.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('cuisines.update', $cuisine->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <strong>Edit Cuisine Details</strong>
            </div>
            <div class="card-body">

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Cuisine Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cuisine->name) }}" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                 <!-- Catagory -->
                <div class="mb-3">
                    <label for="categories" class="form-label">Catagory</label>
                    <input type="text" name="categories" id="categories" class="form-control" value="{{ old('categories', $cuisine->categories) }}" required>
                    @error('categories') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input name="description" id="description" class="form-control" rows="4">{{ old('description', $cuisine->description) }}</input>
                    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $cuisine->price) }}" step="0.01" required>
                    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                    

                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Cuisine Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                    @if($cuisine->image)
                        <p class="mt-2">Current Image:</p>
                        <img src="{{ asset('storage/'.$cuisine->image) }}" alt="Cuisine Image" class="img-fluid" style="max-width: 200px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="spicy_level">Spicy Level</label>
                    <select name="spicy_level" id="spicy_level" class="form-control">
                        <option value="Mild" {{ $cuisine->spicy_level == 'Mild' ? 'selected' : '' }}>Mild</option>
                        <option value="Medium" {{ $cuisine->spicy_level == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Hot" {{ $cuisine->spicy_level == 'Hot' ? 'selected' : '' }}>Hot</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="dietary_option">Dietary Option</label>
                        <select name="dietary_option" id="dietary_option" class="form-control">
                            <option value="Vegan" {{ $cuisine->dietary_option == 'Vegan' ? 'selected' : '' }}>Vegan</option>
                            <option value="Vegetarian" {{ $cuisine->dietary_option == 'Vegetarian' ? 'selected' : '' }}>Vegetarian</option>
                            <option value="Gluten-Free" {{ $cuisine->dietary_option == 'Gluten-Free' ? 'selected' : '' }}>Gluten-Free</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_available">Available</label>
                        <select name="is_available" id="is_available" class="form-control">
                            <option value="1" {{ $cuisine->is_available ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$cuisine->is_available ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Cuisine</button>
                </div>
            </div>
        </div>

    </form>



</div>
@endsection

