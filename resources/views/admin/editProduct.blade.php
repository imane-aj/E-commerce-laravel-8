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
    <div class="row justify-content-center product-index">
        <div class="col-md-4">
            @include('layouts.sideNavbarAdmin')
        </div>
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Edit Product {{ $product->name }}</h3>
                <div class="card-body">
                    <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon3">Product name</span>
                            <input type="text" name="name" placeholder="Product name" class="form-control" value="{{ $product->name }}" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Description</span>
                            <textarea aria-label="With textarea" class="form-control" placeholder="Product description" style="height: 100px" name='description'>{{ $product->description }}</textarea>
                        </div>
                        
                        <img src="{{ asset($product->image) }}" alt="{{$product->name }}" height='112px' width= '112px'>
                        <input type="file" name='image' >
                        
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon3">Price</span>
                            <input type="number" name="price" placeholder="Product price" class="form-control" value="{{ $product->price }}" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon3">Remise</span>
                            <input type="number" name="remise" placeholder="Product remise" class="form-control" value="{{ $product->remise }}" aria-describedby="basic-addon3">
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon3">Quantity</span>
                            <input type="number" name="quantity" placeholder="Product quantity" class="form-control" value="{{ $product->quantity }}" aria-describedby="basic-addon3">
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon3">Recommanded</span>
                            <input type="number" name="recommanded" placeholder="Product quantity" class="form-control" aria-describedby="basic-addon3" min='0' max='1' value="{{ $product->recommended }}">
                        </div>

                        <div class="input-group mb-2">
                            <select name="cat_name" class="form-control">
                                @foreach ($categories as $category)
                                    @foreach ($category->children as $child)
                                        <optgroup label="{{ $child->name }}">
                                            @foreach ($child->children as $subchild_cat))
                                                <option {{ $product->cat_name === $subchild_cat->id? 'selected':'' }} value="{{ $subchild_cat->id }}">{{ $subchild_cat->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-danger w-50">
                                Valid
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection