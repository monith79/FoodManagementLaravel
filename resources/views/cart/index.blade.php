@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Your Cart</h2>
    @if(session('cart') && count(session('cart')) > 0)
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $item)
            <tr>
                <td>{{ $id }}</td>
                <td>{{ $item['name'] }}</td>
                <td>${{ number_format($item['price'], 2) }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                <td>
                    <!-- Remove from Cart -->
                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @php $total += $item['price'] * $item['quantity']; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><strong>Total</strong></td>
                <td colspan="2"><strong>${{ number_format($total, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>
    @else
    <p>Your cart is empty!</p>
    @endif
</div>
@endsection
