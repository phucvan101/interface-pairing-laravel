<div class="features_items">
    <h2 class="title text-center">Features Items</h2>

    @foreach($products as $product)
    <div class="col-sm-4">
        @include('home.components.product_item', ['baseUrl' => config('app.base_url') , 'product' =>$product])
    </div>
    @endforeach
</div>