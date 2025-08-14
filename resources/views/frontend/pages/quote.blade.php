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



<div class="container mt-5">
    <!-- Place an Order Title -->
    <h2 class="font-weight-bold mb-4 text-center">ASK FOR QUOTE</h2>

    <div class="container py-5">

        <div class="container py-5">
            <form id="orderForm" action="{{ route('submit-order') }}" method="POST" onsubmit="return prepareOrderData()">
                @csrf
                <div class="row justify-content-center g-4">
                    @foreach($products as $product)
                    <div class="col-md-4 col-sm-6 d-flex">
                        <div class="card shadow-sm w-100 h-100">
                            <div class="card-body text-center">
                             
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary" onclick="generateInvoice()">ASK QUOTE</button>
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