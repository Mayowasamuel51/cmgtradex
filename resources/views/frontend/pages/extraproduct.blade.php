@extends('frontend.layouts.master')

@section('title','CMG Trade Commodity X || PRODUCT PAGE')

@section('main-content')




<div class="m-4"> 
<div class="text-center">
    <img src="{{ asset('images/Conversion Services Brochure_pages-to-jpg-0001.jpg') }}" alt="Dummy Image" class="img-fluid" style="max-width: 70%; height: auto;">
</div>
    <h1 class="text-center font-bold"> BI-FUEL GENERATOR CONVERSION KITS </h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">GENERATOR DESCRIPTION</th>
                <th scope="col">PRICE</th>
                <!-- <th scope="col">Handle</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>4 CYLINDER GENERATOR</td>
                <td>&#8358;
11,050,000</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>6 CYLINDER GENERATOR</td>
                <td>&#8358;
18,020,000</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td >8 CYLINDER GENERATOR</td>
                <td>&#8358;
40,375,000</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <br/> <br/> <br/>

    <h1 class="text-center font-bold"> MGC MUMAG CNG STORAGE SYSTEM  </h1>
    <div class="text-center">
    <img src="{{ asset('images/Generator Services Brochure_pages-to-jpg-0001.jpg') }}" alt="Dummy Image" class="img-fluid" style="max-width: 70%; height: auto;">
</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">MGC MUMAG STORAGE SYSTEM</th>
                <th scope="col">PRICE</th>
                <!-- <th scope="col">Handle</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>CAPI-X1 75KG STORAGE SYSTEM</td>
                <td>&#8358;
2,550,000</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>CAPI-X2 150KG STORAGE SYSTEM</td>
                <td>&#8358;
5,100,000</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td >CAPI-X4 300KG STORAGE SYSTEM</td>
                <td>&#8358;
10,200,000</td>
                 <td></td>
            </tr>

            <tr>
                <th scope="row">4</th>
                <td >CAPI-X8 600KG STORAGE SYSTEM</td>
                <td>REQUEST FOR QUOTE</td>
                   <td></td>
            </tr>
        </tbody>
    </table>

    <div class="container mt-5">
  <!-- Place an Order Title -->
  <h2 class="font-weight-bold mb-4 text-center">Place an Order</h2>

  <form id="orderForm"  action="{{ route('submit-order') }}" method="post" class="form-group">
  @csrf
  <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your name">
    </div>

    <!-- Email Input -->
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
    </div>
	<div class="form-group">
      <label for="email">Phone:</label>
      <input type="number" id="phone" name="phone" class="form-control" required placeholder="Enter your  phone number ">
    </div>

    <!-- Company Address Input -->
    <div class="form-group">
      <label for="companyAddress">Company Address:</label>
      <input type="text" id="companyAddress" name="companyAddress" class="form-control" required placeholder="Enter your company address">
    </div>

    <!-- List of Items (Checkboxes with prices) -->
	<div class="form-group">
  <label><strong>Product Options Available:</strong></label><br>

  <input type="checkbox" id="storage25k" name="items[]" value="25KG Storage System" data-price="499000">
  <label for="storage25k">25KG Storage System - ₦499,000</label><br>

  <input type="checkbox" id="storage35k" name="items[]" value="35KG Storage System" data-price="575000">
  <label for="storage35k">35KG Storage System - ₦575,000</label><br>

  <input type="checkbox" id="storage50k" name="items[]" value="50KG Storage System" data-price="649000">
  <label for="storage50k">50KG Storage System - ₦649,000</label><br>

  <input type="checkbox" id="mumag2b" name="items[]" value="MGC MUMAG 2-Burner Table Top Gas Cooker (with Oven)" data-price="720000">
  <label for="mumag2b">MGC MUMAG 2-Burner Table Top Gas Cooker (with Oven) - ₦720,000</label><br>

  <input type="checkbox" id="mumag4b" name="items[]" value="MGC MUMAG 4-Burner Table Top Gas Cooker" data-price="335000">
  <label for="mumag4b">MGC MUMAG 4-Burner Table Top Gas Cooker - ₦335,000</label><br>

  <input type="checkbox" id="mumag3b" name="items[]" value="MGC MUMAG 3-Burner Table Top Gas Cooker" data-price="300000">
  <label for="mumag3b">MGC MUMAG 3-Burner Table Top Gas Cooker - ₦300,000</label><br>

  <input type="checkbox" id="mumag2bplain" name="items[]" value="MGC MUMAG 2-Burner Table Top Gas Cooker (Plain)" data-price="190000">
  <label for="mumag2bplain">MGC MUMAG 2-Burner Table Top Gas Cooker (Plain) - ₦190,000</label><br>
</div>


    <!-- Textarea to enter items and quantities -->
    <div class="form-group">
      <label for="itemList">Enter list of items and quantities (e.g. "25k Storage System x2"):</label>
	  <textarea id="itemList" name="itemList" rows="4" class="form-control" placeholder="e.g. 25k Storage System x2, Mumag Cooker x1"></textarea>
    </div>

    <!-- Total Price Display -->
    <!-- <p>Total Price: ₦<span id="totalPrice">0</span></p> -->

    <!-- Hidden Input for Total Price -->
    <input type="hidden" name="totalPrice" id="hiddenPrice">

    <!-- Submit Button -->
	<button type="submit" class="btn btn-primary bg">Get Invoice</button>
	<div>
		<h5 class="">you will get a call or message from our sales dapartment</h5>
	</div>
  </form>
</div>
@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif
			
</div>

</div>

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