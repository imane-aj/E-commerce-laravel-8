<section class="pop-product pro" id="pop">
    <div class="container">
        <h2>All <span>Pro</span>ducts</h2>
        <hr>
        <div class="row">
            @foreach ($Products as $Product)
                <div class="col-md-3">
                    <div class="product text-center">
                        <img src="{{ asset($Product->image) }}">
                        <div class="reduction">
                            <p>-{{ $Product->remise }}%</p>
                        </div>
                        <p>{{ $Product->name }}</p>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <p>{{ $Product->reviews }} reviews</p>
                        <p class="price">{{ $Product->price }} Dhs</p>
                        <form action="{{ url('addcart', $Product->id) }}" method="post">
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