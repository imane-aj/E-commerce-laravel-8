
@extends('inc.master')
@section('title','Doudi Shop')
<style>
    .flex{
        position: fixed;
    bottom: 0;
    width: 100%;
    }
</style>
@section('content')
@include('parts.navbar-categories')
<section class="pro proByCat">
    <div class="container">
        <h2>{{ $category->name }}</h2>
        <hr>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="product text-center">
                        <img src="{{ asset($product->image) }}">
                        <div class="reduction">
                            <p>-{{ $product->remise }}%</p>
                        </div>
                        <p>j{{ $product->name }}</p>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <p>{{ $product->reviews }} reviews</p>
                        <p class="price">{{ $product->price }} Dhs</p>
                        <form action="{{ url('addcart', $product->id) }}" method="post">
                            @csrf
                            <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity"><br>
                            <i class="fal fa-shopping-cart"></i><input type="submit" class="btn btn-warning" value="Add to Shopping Cart">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

    
@endsection