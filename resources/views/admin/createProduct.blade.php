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
                <h3 class="card-title">Add Product</h3>
                <div class="card-body">
                    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" name="name" placeholder="Product name" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <textarea class="form-control" placeholder="Product description" style="height: 100px" name='description'></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <input type="file" name='image' class="form-control">
                        </div>
                        <div class="form-group mb-2" style="display: inline-flex">
                            <input type="number" name="price" placeholder="Product price" class="form-control">
                            <input type="number" name="remise" placeholder="Product remise" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <input type="number" name="quantity" placeholder="Product quantity" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="reco">It is recommender??</label>
                            <input type="number" id="reco" name="recommanded" placeholder="Product quantity" class="form-control" min='0' max='1' value='0'>
                        </div>
                        <div class="form-group mb-2">
                            <select name="cat_name" class="form-control">
                                <option value="" selected disabled>Choose category</option>
                                @foreach ($categories as $category)
                                @foreach ($category->children as $child)
                                <optgroup label="{{ $child->name }}">
                                    @foreach ($child->children as $subchild_cat)
                                        <option value="{{ $subchild_cat->id }}">{{ $subchild_cat->name }}</option>
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