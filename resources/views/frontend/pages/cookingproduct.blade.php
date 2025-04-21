@extends('frontend.layouts.master')

@section('title','CMG Trade Commodity X || PRODUCT PAGE')

@section('main-content')




<div class="m-4"> 
<div class="text-center">
    <img src="{{ asset('images/cookinghome.png') }}" alt="Dummy Image" class="img-fluid" style="max-width: 70%; height: auto;">
</div>
<div class="container text-center my-5">

        <h1 class="fw-bold">THE ERA OF COOKING WITH CNG</h1>
        <h3>COOK WITH CNG AT AFFORDABLE COST OF ₦300/KG</h3>
        <h4>COOK WITH MGC MUMAG CNG STORAGE SYSTEM AND TABLETOP GAS COOKERS</h4>
    </div>
    
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <h5>Storage System Prices</h5>
                <ul class="list-group">
                    <li class="list-group-item">25KG STORAGE SYSTEM - ₦499,000</li>
                    <li class="list-group-item">35KG STORAGE SYSTEM - ₦575,000</li>
                    <li class="list-group-item">50KG STORAGE SYSTEM - ₦649,000</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Gas Cooker Prices</h5>
                <ul class="list-group">
                    <li class="list-group-item">MGC MUMAG 5-Burner Table Top Gas Cooker - ₦370,000</li>
                    <li class="list-group-item">MGC MUMAG 4-Burner Table Top Gas Cooker - ₦335,000</li>
                    <li class="list-group-item">MGC MUMAG 3-Burner Table Top Gas Cooker - ₦300,000</li>
                    <li class="list-group-item">MGC MUMAG 2-Burner Table Top Gas Cooker - ₦190,000</li>
                    <li class="list-group-item">MGC MUMAG 2-Burner Table Top Gas Cooker (Oven) - ₦720,000</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container text-center my-4">
        <h5>For more information, please contact us:</h5>
        <p>CMG PetroGas and Energy Ltd</p>
        <p>20 Michael Adekeye Street, Ilupeju, Lagos</p>
        <p>Website: <a href="https://www.cmgenergy.com">www.cmgenergy.com</a></p>
        <p>Email: sales@cmgenergy.com</p>
        <p>Phone/WhatsApp: 09021317807, 08150461847</p>
        <p class="fw-bold">Energy for today and tomorrow!</p>
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