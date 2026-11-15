@extends('layouts.app')

@section('content')
<h2>Edit Category</h2>
<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Category Title</label>
                <input type="text" name="title" class="form-control" value="{{ $category->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Category Image</label>
                <div class="mb-2">
                    @if($category->image)
                        @if(str_starts_with($category->image, 'http'))
                            <img src="{{ $category->image }}" alt="Current Image" width="100" class="rounded">
                        @else
                            <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" width="100" class="rounded">
                        @endif
                    @endif
                </div>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Leave empty to keep existing image.</small>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection