@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Sellers</h2>
    <a href="{{ route('sellers.create') }}" class="btn btn-primary">Add New Seller</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Linked User</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sellers as $seller)
                <tr>
                    <td>{{ $seller->store_name }}</td>
                    <td>{{ $seller->user->name }}</td>
                    <td>
                        <a href="{{ route('sellers.edit', $seller->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('sellers.destroy', $seller->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $sellers->links() }}
        </div>
    </div>
</div>
@endsection