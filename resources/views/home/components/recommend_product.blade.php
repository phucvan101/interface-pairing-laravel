<div class="recommended_items">
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($productsRecommend->chunk(3) as $key => $productChunk)
            <div class="item {{ $key == 0 ? 'active' : '' }}">
                @foreach($productChunk as $productRecommendItem)
                <div class="col-sm-4">
                    @include('home.components.product_item', ['baseUrl' => config('app.base_url'), 'product'=>$productRecommendItem])
                </div>
                @endforeach
            </div>
            @endforeach
        </div>

        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>