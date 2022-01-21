@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.alerts')
    <div class="row justify-content-center product-index">
        <div class="col-md-4">
            @include('layouts.sideNavbarAdmin')
        </div>
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Client</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Delivered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}Dh</td>
                            <td>{{ $order->quantity * $order->price }}</td>
                            <td class="text-center">
                                @if ($order->paid  == 'not paid')
                                    <i class="fa fa-times text-danger"></i>    
                                @else
                                    <i class="fa fa-check text-success"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($order->status  == 'not delivered')
                                    <i class="fa fa-times text-danger"></i>    
                                @else
                                    <i class="fa fa-check text-success"></i>
                                @endif
                            </td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                                <form method="POST" action="{{ route('orders.update', $order->id) }}">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-sm btn-success">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>
                                <form method="POST" id="{{ $order->id }}" action="{{ route('orders.destroy',$order->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-warning" onclick="event.preventDefault();
                                        if(confirm('you realy want to delete the order {{ $order->product_name }} that was ordered by {{ $order->name }}'))
                                        document.getElementById({{ $order->id }}).submit();">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
