@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.alerts')
    <div class="row justify-content-center product-index">
        <div class="col-md-4">
            @include('layouts.sideNavbarAdmin')
        </div>
        <div class="col-md-8">
            <button  class="btn btn-sm btn-success my-2">
                <a href="{{ route('admin.create') }}" class="text-white" style="text-decoration: none; padding:3px 5px;">
                    <i class="fa fa-plus"></i> Create new product
                </a>
            </button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Remise</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td> <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="50" height="50"> </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>{{ $product->price }}Dh</td>
                            <td class="text-center">
                                @if ($product->quantity  > 0)
                                    {{ $product->quantity }} 
                                @else
                                    <i class="fal fa-minus"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($product->remise  > 0)
                                    {{ $product->remise }}%   
                                @else
                                    <i class="fal fa-minus"></i>
                                @endif
                            </td>
                            <td>{{ $product->category['name'] }}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                <form method="POST" id="{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-warning" onclick="event.preventDefault();
                                        if(confirm('you realy want to delete the product {{ $product->name }}'))
                                        document.getElementById({{ $product->id }}).submit();">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <button  class="btn btn-sm btn-primary">
                                    <a href="{{ route('admin.edit', $product->id) }}" class="text-white" style="text-decoration: none;">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
