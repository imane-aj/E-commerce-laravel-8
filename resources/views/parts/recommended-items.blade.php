<section class="reco-product pro" id="reco">
    <div class="container">
        <h2>R<span>eco</span>mmended</h2>
        <hr>
        <div class="row">
            @foreach ($recoProducts as $recoProduct)
                <div class="col-md-3">
                    <div class="product text-center">
                        <img src="{{ asset($recoProduct->image) }}">
                        <div class="reduction">
                            <p>-{{ $recoProduct->remise }}%</p>
                        </div>
                        <p>j{{ $recoProduct->name }}</p>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <p>{{ $recoProduct->reviews }} reviews</p>
                        <p class="price">{{ $recoProduct->price }} Dhs</p>
                        <form action="{{ url('addcart', $recoProduct->id) }}" method="post">
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