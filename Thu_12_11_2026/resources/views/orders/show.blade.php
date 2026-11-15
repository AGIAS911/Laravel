@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Order Details #{{ $order->id }}</h2>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">Customer Information</div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">Order Summary</div>
            <div class="card-body">
                <p><strong>Status:</strong> <span class="badge bg-secondary">{{ $order->status }}</span></p>
                <p><strong>Stored Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                <p><strong>Dynamically Calculated Total:</strong> ${{ number_format($calculatedTotal, 2) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">Order Items</div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Calculated Total:</th>
                    <th>${{ number_format($calculatedTotal, 2) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection