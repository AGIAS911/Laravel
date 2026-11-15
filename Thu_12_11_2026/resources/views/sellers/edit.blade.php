@extends('layouts.app')

@section('content')
<h2>Edit Seller</h2>
<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('sellers.update', $seller->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Store Name</label>
                <input type="text" name="store_name" class="form-control" value="{{ $seller->store_name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Linked User</label>
                <select name="user_id" class="form-select" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $seller->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Seller</button>
            <a href="{{ route('sellers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection