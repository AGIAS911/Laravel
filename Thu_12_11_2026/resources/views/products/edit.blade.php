@extends('layouts.app')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
<h2>Edit Product</h2>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Seller (Store)</label>
                <select name="seller_id" class="form-select" required>
                    @foreach($sellers as $seller)
                        <option value="{{ $seller->id }}" {{ $product->seller_id == $seller->id ? 'selected' : '' }}>
                            {{ $seller->store_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <div class="mb-2">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" width="100" class="rounded">
                    @endif
                </div>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Leave empty if you don't want to change the image.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection