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