<div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
            <img src="{{$baseUrl  .$product->feature_image_path}}" alt="" />
            <h2>${{number_format($product->price)}}</h2>
            <p>{{$product->name}}</p>
            <a href="" data-url="{{route('addToCart', ['id' =>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
    </div>
</div>