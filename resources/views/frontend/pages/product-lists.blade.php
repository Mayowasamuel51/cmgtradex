@extends('frontend.layouts.master')

@section('title','CMG Trade Commodity X || PRODUCT PAGE')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="javascript:void(0);">Product Categories</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<form action="{{route('shop.filter')}}" method="POST">
	@csrf
	<!-- Product Style 1 -->
	<section class="product-area shop-sidebar shop-list shop section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-12">
					<div class="shop-sidebar">
						<!-- Single Widget -->
						<div class="single-widget category">
							<h3 class="title">Categories</h3>
							<ul class="categor-list">
								@php
								// $category = new Category();
								$menu=App\Models\Category::getAllParentWithChild();
								@endphp
								@if($menu)
								<li>
									@foreach($menu as $cat_info)
									@if($cat_info->child_cat->count()>0)
								<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
									<ul>
										@foreach($cat_info->child_cat as $sub_menu)
										<li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
										@endforeach
									</ul>
								</li>
								@else
								<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
								@endif
								@endforeach
								</li>
								@endif
								{{-- @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
												<li><a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a></li>
								@endif
								@endforeach --}}
							</ul>
						</div>
						<!--/ End Single Widget -->
						<!-- Shop By Price -->

						<!--/ End Shop By Price -->
						<!-- Single Widget -->
						<div class="single-widget recent-post">

						</div>
						<!--/ End Single Widget -->
						<!-- Single Widget -->

						<!--/ End Single Widget -->
					</div>
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<div class="row">
						<div class="col-12">
							<!-- Shop Top -->
							<div class="shop-top">
								<!--<div class="shop-shorter">-->
								<!--	<div class="single-shorter">-->
								<!--		<label>Show :</label>-->
								<!--		<select class="show" name="show" onchange="this.form.submit();">-->
								<!--			<option value="">Default</option>-->
								<!--			<option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>-->
								<!--			<option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>-->
								<!--			<option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>-->
								<!--			<option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>-->
								<!--		</select>-->
								<!--	</div>-->
								<!--	<div class="single-shorter">-->
								<!--		<label>Sort By :</label>-->
								<!--		<select class='sortBy' name='sortBy' onchange="this.form.submit();">-->
								<!--			<option value="">Default</option>-->
								<!--			<option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Name</option>-->
								<!--			<option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Price</option>-->
								<!--			<option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Category</option>-->
								<!--			<option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Brand</option>-->
								<!--		</select>-->
								<!--	</div>-->
								<!--</div>-->
								<ul class="view-mode">
									<li><a href="{{route('product-grids')}}"><i class="fa fa-th-large"></i></a></li>
									<li class="active"><a href="javascript:void(0)"><i class="fa fa-th-list"></i></a></li>
								</ul>
							</div>
							<!--/ End Shop Top -->
						</div>
					</div>
					<div class="row d-flex flex-wrap">
						@if(count($products))
						@foreach($products as $product)
						<!-- Start Single Product Section -->
						<div class="col-12 d-flex flex-row align-items-start">
							<div class="row w-100 d-flex">
								<!-- Product Image Section -->
								<div class="col-lg-4 col-md-6 col-sm-6 d-flex flex-column">
									<div class="single-product">
										<div class="product-img">
											<a href="{{ $product->title === ' Cooking ,Home , industry and commercials.' ? 'http://localhost:8000/cookingproduct' : 'http://localhost:8000/salesprouduct' }}">
												@php
												$photos = explode('|', $product->photo ?? '');
												$firstPhoto = $photos[0] ?? null;
												@endphp
												<img src="{{ asset($firstPhoto ?: 'backend/img/thumbnail-default.jpg') }}"
													class="img-fluid shadow rounded product-image"
													alt="Product Image">
											</a>
											<div class="button-head d-flex justify-content-between">
												<div class="product-action">
													<a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#">
														<i class="ti-eye"></i><span>Quick Shop</span>
													</a>
													<a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="wishlist" data-id="{{$product->id}}">
														<i class="ti-heart"></i><span>Add to Wishlist</span>
													</a>
												</div>
												<div class="product-action-2">
													{{-- <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">Add to cart</a> --}}
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Product Details Section -->
								<div class="col-lg-8 col-md-6 col-12 d-flex flex-column justify-content-center">
									<div class="list-content">
										<div class="product-content">

											<h3 class="title">
												<a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a>
											</h3>
										</div>
										<p class="des pt-2">
											{!! html_entity_decode($product->summary) !!}
										</p>
										{{-- <a href="javascript:void(0)" class="btn cart" data-id="{{$product->id}}">Buy Now NOW!</a> --}}
										<p class="description font-bold p-5 fw-bold">
											{{$product->description}}
											<!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. -->
											<!--Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. -->
											<!--Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. -->
											<!--Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. -->
											<!--Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. -->
											<!--Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. -->
											<!--Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. -->
											<!--Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. -->
											<!--Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. -->
											<!--Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis.-->
											<!--(Continue Lorem Ipsum up to 130 lines)-->
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- End Single Product Section -->
						@endforeach
						@else
						<h1 class="text-warning text-center my-5">COMING SOON </h1>
						@endif
					</div>

					<div class="row">
						<div class="col-md-12 justify-content-center d-flex">
							<!-- list sub Categories -->

							<div class="container mt-4">
    <div class="list-group">

        {{-- Fresh Livestock --}}
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#freshLivestock" role="button" aria-expanded="false" aria-controls="freshLivestock">
            Fresh Livestock
        </a>
        <div class="collapse {{ Request::is('product-cat/fresh-livestock') ? 'show' : '' }}" id="freshLivestock">
            <div class="ms-4 mt-2">
                <p>Beef</p>
                <p>Poultry</p>
                <p>Fish</p>
            </div>
        </div>

        {{-- Groceries --}}
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#groceries" role="button" aria-expanded="false" aria-controls="groceries">
            Groceries
        </a>
        <div class="collapse {{ Request::is('product-cat/groceries') ? 'show' : '' }}" id="groceries">
            <div class="ms-4 mt-2">
                <p>Vegetables</p>
                <p>Grains</p>
                <p>Fruits</p>
                <p>Soup Ingredients</p>
                <p>Spices</p>
            </div>
        </div>

        {{-- Energy --}}
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#energy" role="button" aria-expanded="false" aria-controls="energy">
            Energy
        </a>
        <div class="collapse {{ Request::is('product-cat/energy') ? 'show' : '' }}" id="energy">
            <div class="ms-4 mt-2">
                <p>CNG Supply-as-a-Service</p>
                <p>Diesel Supply-as-a-Service</p>
                <p>LPG Supply-as-a-Service</p>
                <p>Lubricants</p>
            </div>
        </div>

        {{-- Power --}}
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#power" role="button" aria-expanded="false" aria-controls="power">
            Power
        </a>
        <div class="collapse {{ Request::is('product-cat/power') ? 'show' : '' }}" id="power">
            <div class="ms-4 mt-2">
                <p>Tri-Fuel Generator</p>
                <p>Bi-Fuel Generator</p>
                <p>CNG Generator</p>
                <p>Solar</p>
            </div>
        </div>

        {{-- Electricals --}}
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#electricals" role="button" aria-expanded="false" aria-controls="electricals">
            Electricals
        </a>
        <div class="collapse {{ Request::is('product-cat/electricals') ? 'show' : '' }}" id="electricals">
            <div class="ms-4 mt-2">
                <p>Cables</p>
                <p>Extensions</p>
                <p>Pumping Machines</p>
            </div>
        </div>

        {{-- Electronics --}}
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#electronics" role="button" aria-expanded="false" aria-controls="electronics">
            Electronics
        </a>
        <div class="collapse {{ Request::is('product-cat/electronics') ? 'show' : '' }}" id="electronics">
            <div class="ms-4 mt-2">
                <p>Mobile Devices and Accessories</p>
                <p>Laptops and Desktops</p>
                <p>Softwares and Subscriptions</p>
                <p>Servers</p>
                <p>Audio and Video</p>
            </div>
        </div>

        {{-- Building and Construction (No Products) --}}
        <a href="" class="list-group-item list-group-item-action">
            Building and Construction
        </a>

        {{-- Auto Parts (No Products) --}}
        <a href="" class="list-group-item list-group-item-action">
            Auto Parts
        </a>

        {{-- General --}}
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#general" role="button" aria-expanded="false" aria-controls="general">
            General (Residential, Commercial)
        </a>
        <div class="collapse {{ Request::is('product-cat/general') ? 'show' : '' }}" id="general">
            <div class="ms-4 mt-2">
                <p class="">Kitchen Appliances</p>
                <p>Bedroom</p>
                <p>Living Room</p>
                <p>Office</p>
                <p>Cooling and Heating</p>
            </div>
        </div>

        {{-- Metals (No Products) --}}
        <a href="" class="list-group-item list-group-item-action">
            Metals
        </a>

    </div>
</div>

					


							{{-- {{$products->appends($_GET)->links()}} --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Product Style 1  -->
</form>
<!-- Modal -->
@if($products)
@foreach($products as $key=>$product)
<div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
			</div>
			<div class="modal-body">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<!-- Product Slider -->
						<div class="product-gallery">
							<div class="quickview-slider-active">
								@php
								$photo=explode(',',$product->photo);
								// dd($photo);
								@endphp
								@foreach($photo as $data)
								<div class="single-slider">
									<img src="{{$data}}" alt="{{$data}}">
								</div>
								@endforeach
							</div>
						</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="quickview-content">
							<h2>{{$product->title}}</h2>
							<div class="quickview-ratting-review">
								<div class="quickview-ratting-wrap">
									<div class="quickview-ratting">
										{{-- <i class="yellow fa fa-star"></i>
															<i class="yellow fa fa-star"></i>
															<i class="yellow fa fa-star"></i>
															<i class="yellow fa fa-star"></i>
															<i class="fa fa-star"></i> --}}
										@php
										$rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
										$rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
										@endphp
										@for($i=1; $i<=5; $i++)
											@if($rate>=$i)
											<i class="yellow fa fa-star"></i>
											@else
											<i class="fa fa-star"></i>
											@endif
											@endfor
									</div>
									<a href="#"> ({{$rate_count}} customer review)</a>
								</div>
								<div class="quickview-stock">
									@if($product->stock >0)
									<span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
									@else
									<span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
									@endif
								</div>
							</div>
							@php
							$after_discount=($product->price-($product->price*$product->discount)/100);
							@endphp
							<h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small> ${{number_format($after_discount,2)}} </h3>
							<div class="quickview-peragraph">
								<p>{!! html_entity_decode($product->summary) !!}</p>
							</div>
							@if($product->size)
							<div class="size">
								<h4>Size</h4>
								<ul>
									@php
									$sizes=explode(',',$product->size);
									// dd($sizes);
									@endphp
									@foreach($sizes as $size)
									<li><a href="#" class="one">{{$size}}</a></li>
									@endforeach
								</ul>
							</div>
							@endif
							<form action="{{route('single-add-to-cart')}}" method="POST">
								@csrf
								<div class="quantity">
									<!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="hidden" name="slug" value="{{$product->slug}}">
										<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</div>
								<div class="add-to-cart">
									<button type="submit" class="btn">Add to cart</button>
									<a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
								</div>
							</form>
							<div class="default-social">
								<!-- ShareThis BEGIN -->
								<div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endif
<!-- Modal end -->
@endsection
@push ('styles')
<style>
	.pagination {
		display: inline-flex;
	}

	.filter_button {
		/* height:20px; */
		text-align: center;
		background: #F7941D;
		padding: 8px 16px;
		margin-top: 10px;
		color: white;
	}
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
type:"POST",
data:{
_token:"{{csrf_token()}}",
quantity:quantity,
pro_id:pro_id
},
success:function(response){
console.log(response);
if(typeof(response)!='object'){
response=$.parseJSON(response);
}
if(response.status){
swal('success',response.msg,'success').then(function(){
document.location.href=document.location.href;
});
}
else{
swal('error',response.msg,'error').then(function(){
// document.location.href=document.location.href;
});
}
}
})
});
</script> --}}
<script>
	$(document).ready(function() {
		/*----------------------------------------------------*/
		/*  Jquery Ui slider js
		/*----------------------------------------------------*/
		if ($("#slider-range").length > 0) {
			const max_value = parseInt($("#slider-range").data('max')) || 500;
			const min_value = parseInt($("#slider-range").data('min')) || 0;
			const currency = $("#slider-range").data('currency') || '';
			let price_range = min_value + '-' + max_value;
			if ($("#price_range").length > 0 && $("#price_range").val()) {
				price_range = $("#price_range").val().trim();
			}

			let price = price_range.split('-');
			$("#slider-range").slider({
				range: true,
				min: min_value,
				max: max_value,
				values: price,
				slide: function(event, ui) {
					$("#amount").val(currency + ui.values[0] + " -  " + currency + ui.values[1]);
					$("#price_range").val(ui.values[0] + "-" + ui.values[1]);
				}
			});
		}
		if ($("#amount").length > 0) {
			const m_currency = $("#slider-range").data('currency') || '';
			$("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
				"  -  " + m_currency + $("#slider-range").slider("values", 1));
		}
	})
</script>

@endpush