<section class="new-product pro" id="new">
    <div class="container">
        <h2>New <span>arr</span>ived</h2>
        <hr>
        <div class="row">
            @foreach ($newProducts as $newProduct)
                <div class="col-md-3" data-aos="fade-right" data-aos-duration="2000">
                    <div class="product text-center">
                        <img src="{{ asset($newProduct->image) }}">
                        <div class="reduction">
                            <p>-{{ $newProduct->remise }}%</p>
                        </div>
                        <p>{{ $newProduct->name }}</p>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <p>34 reviews</p>
                        <p class="price">{{ $newProduct->price }} Dhs</p>
                        <form action="{{ url('addcart', $newProduct->id) }}" method="post">
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