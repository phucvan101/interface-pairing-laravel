<div class="features_items">
    <h2 class="title text-center">Features Items</h2>

    @foreach($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">

            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{$baseUrl  .$product->feature_image_path}}" alt="" />
                    <h2>{{number_format($product->price)}} VND</h2>
                    <p>{{$product->name}}</p>
                    <a href="" data-url="{{route('addToCart', ['id' =>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <img src="{{$baseUrl  .$product->feature_image_path}}" alt="" />
                        <h2>{{number_format($product->price)}} VND</h2>
                        <p>{{$product->name}}</p>
                        <a href="" data-url="{{route('addToCart', ['id' =>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function addToCart(event) {
        event.preventDefault()
        let urlCart = $(this).data('url');
        $.ajax({
            type: "GET",
            url: urlCart,
            dataType: 'json',
            success: function(data) {

            },
            error: function() {

            }
        });
    }

    $(function() {
        $('.add-to-cart').on('click', addToCart);
    })
</script>