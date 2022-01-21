@extends('layouts.app')
<style>
    body{
        background-image: url('/img/pngtree-shopping.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>
@section('content')
<div class="container">
    @include('layouts.alerts')
    <div class="row justify-content-center index-admin">
        <div class="col-md-4">
            <a href="{{ route('admin.products') }}" style="text-decoration: none">
                <div class="card text-white">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3>Products</h3>
                        <span class='font-weight-bold'>{{ $products->count() }}</span>
                    </div>
                </div> 
            </a>   
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.orders') }}" style="text-decoration: none">
                <div class="card bg-danger text-white">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3>Orders</h3>
                        <span class='font-weight-bold'>{{ $orders->count() }}</span>
                    </div>
                </div> 
            </a>   
        </div>
    </div>
</div>
@endsection
