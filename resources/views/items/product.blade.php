<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img style="height: 300px;" src="{{URL::to($product->product_image)}}" alt="" />
                <h2>{{$product->product_price}}</h2>
                <p>{{$product->product_name}}</p>
                    @include('items.btn_add_cart_once')
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>{{$product->product_price}}</h2>
                    <p>{{$product->product_name}}</p>
                    @include('items.btn_add_cart_once')
                </div>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                    @if(Session::get('customer_id'))
                        @if(!empty($all_wishlist))
                            @php 
                                $_isWish = false;      
                            @endphp  
                            @foreach($all_wishlist as $wishlist)
                                @if($wishlist->product_id == $product->product_id)
                                @php  $_isWish = true; @endphp
                                @endif
                            @endforeach

                            
                            @if($_isWish)
                            <li><a href="{{URL::to(

                                '/wishlist/remove/'.$wishlist->wishlist_id

                                )}}"><i class="fa fa-times"></i>حذف علاقه مندی ها</a></li>
                            @else
                            <li><a href="{{URL::to(

                                '/wishlist/add/'.Session::get('customer_id').'/product/id/'.$product->product_id

                                )}}"><i class="fa fa-plus-square"></i> افزودن به علاقه مندی ها  </a></li>
                            @endif
                        @endif
                    @endif
                <li><a href="{{URL::to(
                	'/product/'.$product->id.'/'.$product->product_name
                	)}}"><i class="fa fa-plus-square"></i>نمایش محصول</a></li>
            </ul>
        </div>
    </div>
</div>