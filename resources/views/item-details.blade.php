@extends('inc.master')
@section('title','Doudi Shop item details')

@section('content')
@include('parts.navbar-categories')
    <section class="item-info">
        <div class="container">
            <h4>{{ $product->name }}</h4>
            <div class="row">
                <div class="col-md-6">
                    
                        <img src="{{ asset($product->image) }}" class="imgHero" id="imgHero" alt="">
                        <div class="small-img-row">
                            <div class="small-img-col">
                                <img src="img/newItems/new1.jpg" alt="" class="small-img">
                            </div>
                            <div class="small-img-col">
                                <img src="img/popItems/pop-product1.jpg" alt="" class="small-img">
                            </div>
                            <div class="small-img-col">
                                <img src="img/newItems/new2.jpg" alt="" class="small-img">
                            </div>
                            <div class="small-img-col">
                                <img src="img/newItems/new3.jpg" alt="" class="small-img">
                            </div>
                        </div>
                
                </div>
                <div class="col-md-6">
                    <h5>Details</h5>
                    <p>{{ $product->description }}</p>
                    <p class="price">{{ $product->price }} Dhs</p>
                    <form action="{{ url('addcart', $product->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="quantity" id="quantity-label">Quantity:</label>
                            <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity">
                        </div>
                        <hr>
                        <div class="product-footer">
                            <i class="fal fa-shopping-cart"></i><input type="submit" class="btn btn-success" value="Add to Shopping Cart" style="border: none;">
                            <a href='{{ route('categories') }}' class="btn btn-warning close"><i class="fal fa-times"></i> Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    
    <div class="reco-details">
        @include('parts.recommended-items')
    </div>
    @include('parts.footer-info')
    
@endsection