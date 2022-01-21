@extends('inc.master')
@section('title','Doudi Shop Wishlist')
<style>
    .flex{
        position: fixed;
    bottom: 0;
    width: 100%;
    }
</style>
@section('content')
@include('parts.navbar-categories')

<div class="container" style="margin: 2em auto -2em">
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissbile fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" 
            aria-label="Close"></button>
        </div>          
        @endif
</div>
<section class="wishlist">
    <div class="container">
            <table class="first">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <form action="{{ url('order') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @foreach ($cart as $carts)
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="{{ asset($carts->image) }}" alt="">
                                <div>
                                    <p> <input type="text" value="{{ $carts->product_name }}" name="productname[]" hidden=""> {{ $carts->product_name }}</p>
                                    <small>
                                    <input type="text" value="{{ $carts->price }}" name="productprice[]" hidden="">Price: {{ $carts->price }}Dhs</small><br>
                                    <a href="{{ url('delete', $carts->id) }}">Delete</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="text" value="{{ $carts->quantity }}" name="productquantity[]" hidden=""> {{ $carts->quantity }}</td>
                        <td>{{ $carts->price }} Dhs</td>
                    </tr>
                @endforeach
                <tr class="justify-content-end"><td><button class="btn">Confirm Order</button></td></tr>
            </form>
        </table>
    </div>
</section>
@endsection
