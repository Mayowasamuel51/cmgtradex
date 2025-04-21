@extends('frontend.layouts.master')

@section('title', 'CMG Order Form')

@section('main-content')
<div class="container mt-5" x-data="orderForm()">
    <h2 class="mb-4">Purchase Order Form</h2>

    <form method="POST" action="">
        @csrf

        {{-- Personal Info --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col-md-6">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea class="form-control" name="address" required></textarea>
        </div>

        {{-- Product Order --}}
        <h4 class="mt-4">Product Order</h4>

        <div class="mb-3">
            <label>Type of Product</label>
            <select class="form-control" x-model="selectedType">
                <option value="">Select Type</option>
                <template x-for="(cats, type) in subcategories" :key="type">
                    <option :value="type" x-text="type"></option>
                </template>
            </select>
        </div>

        <div class="mb-3" x-show="selectedType">
            <label>Category</label>
            <select class="form-control" x-model="selectedCategory">
                <option value="">Select Category</option>
                <template x-for="cat in subcategories[selectedType]" :key="cat">
                    <option :value="cat" x-text="cat"></option>
                </template>
            </select>
        </div>

        <div class="mb-3" x-show="selectedCategory">
            <label>Choose Items</label>
            <div>
                <template x-for="(price, name) in products[selectedCategory]" :key="name">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                            :id="name"
                            :value="name"
                            x-model="selectedItems"
                            :data-price="price">
                        <label class="form-check-label" :for="name" x-text="`${name} - ₦${price.toLocaleString()}`"></label>
                    </div>
                </template>
            </div>
        </div>

        <div class="row mb-3" x-show="selectedItems.length">
            <div class="col-md-4">
                <label>Total Quantity</label>
                <input type="number" class="form-control" x-model="quantity" min="1">
            </div>
            <div class="col-md-4">
                <label>Total Price</label>
                <input type="text" class="form-control" :value="'₦' + totalPrice.toLocaleString()" readonly>
            </div>
        </div>

        <input type="hidden" name="items" :value="JSON.stringify(selectedItems)">
        <input type="hidden" name="total_price" :value="totalPrice">
        <input type="hidden" name="quantity" :value="quantity">

        {{-- Payment --}}
        <h5 class="mt-4">Payment Method</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" value="bank_app" required>
            <label class="form-check-label">Bank App</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" value="internet_banking">
            <label class="form-check-label">Internet Banking</label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="payment_method" value="direct_transfer">
            <label class="form-check-label">Direct Transfer</label>
        </div>

        <div class="bg-light p-3 mb-4">
            <h6>Payment Account</h6>
            <p><strong>Bank:</strong> UBA</p>
            <p><strong>Account Name:</strong> CMG Franchise Company LTD</p>
            <p><strong>Account Number:</strong> 1234567890</p>
        </div>

        <button type="submit" class="btn btn-primary">Submit Order</button>
    </form>
</div>
@endsection


@push('scripts')
<script>
    function orderForm() {
        return {
            selectedType: '',
            selectedCategory: '',
            selectedItems: [],
            quantity: 1,

            subcategories: {
                Power: ['Cooking', 'Generator'],
                Energy: ['Battery', 'Solar'],
                Metal: ['Copper', 'Aluminum']
            },

            products: {
                Cooking: {
                    '25KG STORAGE SYSTEM': 499000,
                    '35KG STORAGE SYSTEM': 575000,
                    '50KG STORAGE SYSTEM': 649000,
                },
                Generator: {
                    '5KVA CMG Generator': 250000,
                    '10KVA CMG Generator': 500000,
                },
                Battery: {
                    'Lithium Battery Pack': 150000,
                    'AGM Battery': 100000,
                },
                Solar: {
                    '200W Panel': 75000,
                    '300W Panel': 105000,
                },
                Copper: {
                    'Copper Rod': 130000,
                    'Copper Wire': 95000,
                },
                Aluminum: {
                    'Aluminum Sheet': 85000,
                    'Aluminum Rod': 92000,
                }
            },

            get totalPrice() {
                return this.selectedItems.reduce((sum, item) => {
                    const price = this.products[this.selectedCategory][item] || 0;
                    return sum + price;
                }, 0) * this.quantity;
            }
        };
    }
</script>
@endpush
