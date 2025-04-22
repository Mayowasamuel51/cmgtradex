@extends('frontend.layouts.master')

@section('meta')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content=''>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">

<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$product_detail->title}}">
<meta property="og:image" content="{{$product_detail->photo}}">
<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title','CMG Trade Commodity X || PRODUCT DETAIL')
@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="{{route('product-grids')}}">Products<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="javascript:void(0);">Products Details</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Shop Single -->
<section class="shop single section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Product Slider -->
						<div class="product-gallery">
							<!-- Images slider -->
							<div class="flexslider-thumbnails">
								<ul class="slides">

									@if(!empty($product_detail->photo))
									<!-- aliable and out of stock -->
									@php
									$photos = explode('|', $product_detail->photo); // Convert string to array
									$firstPhoto = $photos[0] ?? null; // Get first image safely
									@endphp

									@if($firstPhoto)
									<img src="{{ asset($firstPhoto) }}" class="img-fluid shadow rounded product-image" alt="Product Image">
									@else
									<img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid" style="max-width:80px;" alt="Default Image">
									@endif
									@else
									<img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid" style="max-width:80px;" alt="Default Image">
									@endif






								</ul>
							</div>
							<!-- End Images slider -->
						</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-12">
						<div class="product-des">
							<!-- Description -->
							<div class="short">
								<h4>{{$product_detail->title}}</h4>
								<div class="rating-main">
									<ul class="rating">
										@php
										$rate=ceil($product_detail->getReview->avg('rate'))
										@endphp
										@for($i=1; $i<=5; $i++)
											@if($rate>=$i)
											<li><i class="fa fa-star"></i></li>
											@else
											<li><i class="fa fa-star-o"></i></li>
											@endif
											@endfor
									</ul>

								</div>


								<p class="description">{!!($product_detail->summary)!!}</p>
							</div>
							<!--/ End Description -->
							<!-- Color -->
							{{-- <div class="color">
												<h4>Available Options <span>Color</span></h4>
												<ul>
													<li><a href="#" class="one"><i class="ti-check"></i></a></li>
													<li><a href="#" class="two"><i class="ti-check"></i></a></li>
													<li><a href="#" class="three"><i class="ti-check"></i></a></li>
													<li><a href="#" class="four"><i class="ti-check"></i></a></li>
												</ul>
											</div> --}}
							<!--/ End Color -->
							<!-- Size -->
							@if($product_detail->size)

							@endif
							<!--/ End Size -->
							<!-- Product Buy -->
							<div class="product-buy">

								<p class="cat">Category :<a href="{{route('product-cat',$product_detail->cat_info['slug'])}}">{{$product_detail->cat_info['title']}}</a></p>
								@if($product_detail->sub_cat_info)
								<p class="cat mt-1">Sub Category :<a href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}">{{$product_detail->sub_cat_info['title']}}</a></p>
								@endif

							</div>
							<!--/ End Product Buy -->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Description Tab -->
								<div class="tab-pane fade show active" id="description" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-12">
												<div class="single-des">

												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Description Tab -->

								<!--  -->
								<div class="container mt-5">
									<!-- Place an Order Title -->
									<h2 class="font-weight-bold mb-4 text-center">Place an Order</h2>

									<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">CMG PRODUCT LISTING</h2>
	<div class="container py-5">
  <h2 class="text-center mb-5 fw-bold">CMG PRODUCT LISTING</h2>

  @php
    $products = [
      ['items' => [['name' => '25KG STORAGE SYSTEM', 'price' => 499000], ['name' => '35KG STORAGE SYSTEM', 'price' => 575000], ['name' => '50KG STORAGE SYSTEM', 'price' => 649000]]],
      ['items' => [['name' => 'MGC MUMAG 2-Burner Table Top Gas Cooker (with Oven)', 'price' => 720000]]],
      ['items' => [['name' => 'MGC MUMAG 4-Burner Table Top Gas Cooker', 'price' => 335000], ['name' => 'MGC MUMAG 3-Burner Table Top Gas Cooker', 'price' => 300000], ['name' => 'MGC MUMAG 2-Burner Table Top Gas Cooker', 'price' => 190000]]],
      ['items' => [['name' => 'MGC MUMAG 5-Burner Table Top Gas Cooker', 'price' => 370000]]]
    ];
  @endphp

  <form id="orderForm" action="{{ route('submit-order') }}" method="POST" onsubmit="return prepareOrderData()">
    @csrf
    <div class="row justify-content-center g-4">
      @foreach($products as $product)
        <div class="col-md-4 col-sm-6 d-flex">
          <div class="card shadow-sm w-100 h-100">
            <div class="card-body text-center">
              @foreach($product['items'] as $item)
                <div class="mb-3">
                  <h6 class="mb-1 fw-semibold">{{ $item['name'] }}</h6>
                  <span class="badge bg-success">₦{{ number_format($item['price']) }}</span>
                  <input type="number" class="form-control quantity mt-2"
                        min="0"
                        placeholder="Qty"
                        data-price="{{ $item['price'] }}"
                        data-name="{{ $item['name'] }}">
                </div>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center mt-4">
      <button type="button" class="btn btn-primary" onclick="generateInvoice()">Generate Invoice</button>
    </div>

    <div class="mt-5" id="invoiceSection" style="display:none">
      <h4 class="fw-bold">Invoice Summary</h4>
      <ul class="list-group mb-3" id="invoiceList"></ul>
      <h5>Total: <span id="invoiceTotal"></span></h5>

      <!-- Hidden inputs to store generated values -->
      <textarea name="itemList" id="hiddenItemList" class="form-control" hidden></textarea>
      <input type="hidden" name="totalPrice" id="hiddenPrice">

      <!-- Customer Info -->
      <div class="form-group mt-4">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Phone:</label>
        <input type="number" name="phone" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Company Address:</label>
        <input type="text" name="companyAddress" class="form-control" required>
      </div>

      <div class="text-center mt-3">
        <button type="submit" class="btn btn-success">Submit Order</button>
      </div>
    </div>
  </form>
</div>

   
</div>
								</div>
								@if (session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
								@endif

								<!--  -->
								<!-- Reviews Tab -->
								<div class="tab-pane fade" id="reviews" role="tabpanel">
									<div class="tab-single review-panel">
										<div class="row">
											<div class="col-12">

												<!-- Review -->
												<div class="comment-review">
													<div class="add-review">
														<h5>Add A Review</h5>
														<p>Your email address will not be published. Required fields are marked</p>
													</div>
													<h4>Your Rating <span class="text-danger">*</span></h4>
													<div class="review-inner">
														<!-- Form -->
														@auth
														<form class="form" method="post" action="{{route('review.store',$product_detail->slug)}}">
															@csrf
															<div class="row">
																<div class="col-lg-12 col-12">
																	<div class="rating_box">
																		<div class="star-rating">
																			<div class="star-rating__wrap">
																				<input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
																				<label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
																				<input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
																				<label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
																				<input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
																				<label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
																				<input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
																				<label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
																				<input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
																				<label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
																				@error('rate')
																				<span class="text-danger">{{$message}}</span>
																				@enderror
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-lg-12 col-12">
																	<div class="form-group">
																		<label>Write a review</label>
																		<textarea name="review" rows="6" placeholder=""></textarea>
																	</div>
																</div>
																<div class="col-lg-12 col-12">
																	<div class="form-group button5">
																		<button type="submit" class="btn">Submit</button>
																	</div>
																</div>
															</div>
														</form>
														@else
														<p class="text-center p-5">
															You need to <a href="{{route('login.form')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register.form')}}">Register</a>

														</p>
														<!--/ End Form -->
														@endauth
													</div>
												</div>

												<div class="ratting-main">
													<div class="avg-ratting">
														{{-- @php 
																			$rate=0;
																			foreach($product_detail->rate as $key=>$rate){
																				$rate +=$rate
																			}
																		@endphp --}}
														<h4>{{ceil($product_detail->getReview->avg('rate'))}} <span>(Overall)</span></h4>
														<span>Based on {{$product_detail->getReview->count()}} Comments</span>
													</div>
													@foreach($product_detail['getReview'] as $data)
													<!-- Single Rating -->
													<div class="single-rating">
														<div class="rating-author">
															@if($data->user_info['photo'])
															<img src="{{$data->user_info['photo']}}" alt="{{$data->user_info['photo']}}">
															@else
															<img src="{{asset('backend/img/avatar.png')}}" alt="Profile.jpg">
															@endif
														</div>
														<div class="rating-des">
															<h6>{{$data->user_info['name']}}</h6>
															<div class="ratings">

																<ul class="rating">
																	@for($i=1; $i<=5; $i++)
																		@if($data->rate>=$i)
																		<li><i class="fa fa-star"></i></li>
																		@else
																		<li><i class="fa fa-star-o"></i></li>
																		@endif
																		@endfor
																</ul>
																<div class="rate-count">(<span>{{$data->rate}}</span>)</div>
															</div>
															<p>{{$data->review}}</p>
														</div>
													</div>
													<!--/ End Single Rating -->
													@endforeach
												</div>

												<!--/ End Review -->

											</div>
										</div>
									</div>
								</div>
								<!--/ End Reviews Tab -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Shop Single -->

<!-- Start Most Popular -->
<div class="product-area most-popular related-product section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Related Products</h2>
				</div>
			</div>
		</div>
		<div class="row">
			{{-- {{$product_detail->rel_prods}} --}}
			<div class="col-12">
				<div class="owl-carousel popular-slider">
					@foreach($product_detail->rel_prods as $data)
					@if($data->id !==$product_detail->id)
					<!-- Start Single Product -->
					<div class="single-product">
						<div class="product-img">
							<a href="{{route('product-detail',$data->slug)}}">




								@php
								$photo=explode(',',$data->photo);
								@endphp
								<img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
								<img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">

								{{-- <span class="out-of-stock">Hot</span> --}}
							</a>
							<div class="button-head">
								<div class="product-action">

								</div>

							</div>
						</div>
						<div class="product-content">
							<h3><a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a></h3>
							<div class="product-price">

							</div>

						</div>
					</div>
					<!-- End Single Product -->

					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Most Popular Area -->


<!-- Modal -->
<div class="modal fade" id="modelExample" tabindex="-1" role="dialog">
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
								<div class="single-slider">
									<img src="images/modal1.png" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal2.png" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal3.png" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal4.png" alt="#">
								</div>
							</div>
						</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="quickview-content">
							<h2>Flared Shift Dress</h2>
							<div class="quickview-ratting-review">
								<div class="quickview-ratting-wrap">
									<div class="quickview-ratting">
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="#"> (1 customer review)</a>
								</div>
								<div class="quickview-stock">
									<span><i class="fa fa-check-circle-o"></i> in stock</span>
								</div>
							</div>

							<div class="quickview-peragraph">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
							</div>
							<div class="size">
								<div class="row">
									<div class="col-lg-6 col-12">
										<h5 class="title">Size</h5>
										<select>
											<option selected="selected">s</option>
											<option>m</option>
											<option>l</option>
											<option>xl</option>
										</select>
									</div>
									<div class="col-lg-6 col-12">
										<h5 class="title">Color</h5>
										<select>
											<option selected="selected">orange</option>
											<option>purple</option>
											<option>black</option>
											<option>pink</option>
										</select>
									</div>
								</div>
							</div>
							<div class="quantity">
								<!-- Input Order -->
								<div class="input-group">
									<div class="button minus">
										<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											<i class="ti-minus"></i>
										</button>
									</div>
									<input type="text" name="qty" class="input-number" data-min="1" data-max="1000" value="1">
									<div class="button plus">
										<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
											<i class="ti-plus"></i>
										</button>
									</div>
								</div>
								<!--/ End Input Order -->
							</div>
							<div class="add-to-cart">
								<a href="#" class="btn">Add to cart</a>
								<a href="#" class="btn min"><i class="ti-heart"></i></a>
								<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
							</div>
							<div class="default-social">
								<h4 class="share-now">Share:</h4>
								<ul>
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal end -->

@endsection
@push('styles')
<style>
	/* Rating */
	.rating_box {
		display: inline-flex;
	}

	.star-rating {
		font-size: 0;
		padding-left: 10px;
		padding-right: 10px;
	}

	.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
	}

	.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
	}

	.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #F7941D;
		font-size: 16px;
		margin-top: 5px;
	}

	.star-rating__ico:last-child {
		padding-left: 0;
	}

	.star-rating__input {
		display: none;
	}

	.star-rating__ico:hover:before,
	.star-rating__ico:hover~.star-rating__ico:before,
	.star-rating__input:checked~.star-rating__ico:before {
		content: "\F005";
	}
</style>
@endpush
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
	function generateInvoice() {
  const quantities = document.querySelectorAll('.quantity');
  let total = 0;
  let itemList = [];
  let html = '';

  quantities.forEach(input => {
    const qty = parseInt(input.value);
    const price = parseInt(input.dataset.price);
    const name = input.dataset.name;

    if (qty > 0) {
      const subtotal = qty * price;
      total += subtotal;
      html += `<li class="list-group-item">${qty} × ${name} = ₦${subtotal.toLocaleString()}</li>`;
      itemList.push(`${qty} × ${name} = ₦${subtotal.toLocaleString()}`);
    }
  });

  if (itemList.length === 0) {
    html = '<li class="list-group-item">No items selected.</li>';
  }

  document.getElementById('invoiceList').innerHTML = html;
  document.getElementById('invoiceTotal').innerText = `₦${total.toLocaleString()}`;
  document.getElementById('hiddenItemList').value = itemList.join('\n');
  document.getElementById('hiddenPrice').value = total;
  document.getElementById('invoiceSection').style.display = 'block';
}

function prepareOrderData() {
  const hiddenList = document.getElementById('hiddenItemList').value;
  const hiddenPrice = document.getElementById('hiddenPrice').value;

  if (!hiddenList || hiddenPrice == 0) {
    alert('Please generate invoice before submitting!');
    return false;
  }

  return true;
}
</script>

@endpush