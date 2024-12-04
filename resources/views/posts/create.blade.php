@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Description</label>
            <textarea name="description" id="description" rows="10" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success">Add</button>
    </form>
</div>
@endsection