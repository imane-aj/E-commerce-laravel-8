@extends('inc.master')
@section('title','Doudi Shop Categories')
@section('content')
    @include('parts.navbar-categories')

    <section class="category">
        <div class="container">
                <h2>Category products</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="filters">
                            <h5>Filtres</h5>
                            <form action="">
                                <div class="range">
                                    <h4>Pice(Dhs)</h4>
                                    <div class="row">
                                        <div class="col">
                                            <label for="quantity" id="quantity-label">From</label>
                                            <input type="number" class="form-control" step="1" name="quantity" class="form-control" value="0" min='0'/>
                                        </div>
                                        <div class="col">
                                            <label for="quantity" id="quantity-label">To</label>
                                            <input type="number" class="form-control" step="1" name="quantity" class="form-control" value="0" min='0'/> 
                                        </div>
                                    </div> 
                                </div>
                                <div class="remise">
                                    <h4>Remise(%)</h4>
                                    <div>
                                        <input type="radio" id='50' value="50%" name='remise'>
                                        <label for="50">50% et plus</label>
                                    </div>
                                    <div>
                                        <input type="radio" id='40' value="40%" name='remise'>
                                        <label for="40">50% et plus</label>
                                    </div>
                                <div>
                                        <input type="radio" id='30' value="30%" name='remise'>
                                        <label for="30">30% et plus</label>
                                </div>
                                    <div>
                                        <input type="radio" id='20' value="20%" name='remise'>
                                        <label for="20">20% et plus</label>
                                    </div>
                                    <div>
                                        <input type="radio" id='10' value="10%" name='remise'>
                                        <label for="10">10% et plus</label>
                                    </div>
                                </div>
                                <div class="shipped-from">
                                    <h4>Shipped from</h4>
                                    <div>
                                        <input type="radio" id='us' name='shapped'>
                                        <label for="us">Shipped from abroad</label>
                                    </div>
                                    <div>
                                        <input type="radio" id='turc' name='shapped'>
                                        <label for="turc">Shipped from morocco</label>
                                    </div>
                                </div>
                                <input type="Submit" value="Apply" class="btn w-100 btn-warning btn-warning" name='range'>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-9">
                        @foreach ($products as $product)
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset($product->image) }}" alt="">
                                    <div class="reduction">
                                        <p>-{{ $product->remise }}%</p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{ $product->name }}</h4>
                                    <div class="starts">
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                    </div>
                                    <p>{{ Str::limit($product->description, 50) }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="item-links">
                                        <p class="price">{{ $product->price}} Dhs | <a href="{{ route('details-item', $product->id) }}">Details</a></p>
                                        
                                        <form action="{{ url('addcart', $product->id) }}" method="post">
                                            @csrf
                                            <input type="number" value="1" min="1" class="form-control" style="width:100px; margin-top: 1em;" name="quantity"><br>
                                            <i class="fal fa-shopping-cart"></i><input type="submit" class="btn btn-danger w-100" value="Add to Cart">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex">
                            {{ $products->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </section>

    @include('parts.footer-info')
@endsection
    
