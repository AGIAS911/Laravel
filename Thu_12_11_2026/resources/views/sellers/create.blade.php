@extends('layouts.app')

@section('content')
<h2>Add New Seller</h2>
<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('sellers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Store Name</label>
                <input type="text" name="store_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Link to User</label>
                <select name="user_id" class="form-select" required>
                    <option value="">Select a User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save Seller</button>
            <a href="{{ route('sellers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection