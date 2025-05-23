<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $indexCategory => $categoryItem)
            <li class="{{$indexCategory == 0 ? 'active' : ''}}"><a href="#category_tab_{{$categoryItem->id}}" data-toggle="tab">
                    {{$categoryItem->name}}
                </a></li>
            @endforeach
        </ul>


    </div>
    <div class="tab-content">
        @foreach($categories as $indexCategoryProduct => $categoryItemProduct)
        <div class="tab-pane fade {{ $indexCategoryProduct == 0 ? 'active in' : ''}}" id="category_tab_{{$categoryItemProduct->id}}">
            @foreach($categoryItemProduct->products as $productItemTabs)
            <div class="col-sm-3">
                @include('home.components.product_item', ['baseUrl' => config('app.base_url'), 'product' =>$productItemTabs])
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>