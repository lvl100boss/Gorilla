{{-- This is Only for static purposes --}}
@php

function formatPrice($price) {
    return number_format($price, 2, '.', ',');
}
// $images = [
//     '1atDc9frfsfU4gC1mbADcmfflwr3fHS6yltQE18W.jpg',
//     '1P3v3AAuINcimsLxQYuIhvfSyfUpy62TeIkhXMGV.jpg',
//     '5ugfVZ5gzjCUqI6PeBpL6qP0soLbKgZTEYO25sW7.jpg',
//     'P1MDskbXDCqlmaIMMuIgxGgVEsIv8JhcXTGQ9YaF.webp',
//     'JVK9KIhq3seGeuirQo0YAkmOCif8iXhRhjoFdtBs.jpg'
// ];
// $shirtNames = [
//     'Plain Black Beige',
//     'Top Sleeveless',
//     'Tea Plain Shirt',
//     'Red Polo Shirt',
//     'Macha Sweater'
// ];
// $sizes = [
//     'Large',
//     'Medium',
//     'Extra Large',
//     'Large',
//     'Small'
// ];
// $prices = [
//     998,
//     798,
//     399,
//     400,
//     399
// ];
// $quantity = [1,3,2,1,5];


@endphp
<x-layout>
    <section class="max-w-screen-xl mx-auto pt-20 pb-28">

        {{-- Container of Cart --}}
        <div class="grid grid-cols-5 bg-medium-dark p-6 rounded-md gap-10">
            {{-- Left Box --}}
            <div class="col-span-3">
                <div class="mb-6">
                    <h1 class="text-lg font-semibold">Cart</h1>
                </div>

                @if (session('success'))
                    <div id="success-message" class="bg-green-500 text-white p-3 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div id="success-message" class="bg-green-500 text-white p-3 rounded-md mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-6">
                    <h6 class="text-sm opacity-40">You have <span id="item-count">{{ $cartItems->count() }}</span> items in your cart</h6>
                </div>
                {{-- container for the items --}}
                <div>
                    
                    {{-- the Item --}}
                    
                    {{-- @for ($i = 0; $i < count($shirtNames); $i++) --}}
                    @foreach ($cartItems as $item)
                        
                        @php
                            // $itemTotal = $prices[$i] * $quantity[$i];
                            // $totalPrice += $itemTotal;

                            // $individual_price = ($item->product->price - $item->product->discount) * $item->quantity;

                        @endphp
                        <div class="bg-light-dark p-3 rounded-md flex items-center justify-between cursor-pointer hover:scale-[1.01] hover:shadow-xl shadow-lg transition-transform ease-in-out mb-4">
                            <div class="flex items-center gap-3">
                                <div>
                                    <img class="h-14 w-14 rounded-md" src="{{ asset('storage/'. $item->product->image) }}" alt="{{ $item->product->image }}">
                                </div>
                                <div>
                                    <p class="text-left text-sm">{{ $item->product->name }}</p>
                                    <p class="text-left text-sm opacity-40">Size: {{ Str::upper($item->size) }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-8 mr-3">
                                {{-- Quantity --}}
                                {{-- <p class="text-sm" id="quantity">{{ $item->quantity }}</p> --}}
                                
                                {{-- <input class="text-black w-fit h-auto bg-none" type="number" name="quantity" id="{{ $item->id }}" value="{{ $item->quantity }}" data-id="{{ $item->id }}"> --}}

                                <input 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-lightest-dark dark:border-gray-400 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 quantity-input" type="number" name="quantity" data-id="{{ $item->id }}" value="{{ $item->quantity }}" min="1">

                                @php
                                    $listed_price = $item->product->price - $item->product->discount;
                                    $total_price = $item->quantity * $listed_price;
                                @endphp

                                {{-- Price --}}
                                <p class="text-sm w-10 text-left">₱<span class="item-price" data-id="{{ $item->id }}">{{ $total_price }}</span></p>

                                <form action="{{ route('cart_destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- Remove Icon --}}
                                    <button type="submit">
                                        <i class="fi fi-rs-trash text-sm hover:text-red-600 cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    {{-- @endfor --}}
                    @endforeach
                </div>
            </div>
            {{-- Right Box --}}
            <div class="col-span-2 mr-4">
                <div class="mb-6">
                    <h1 class="text-lg font-semibold py-1">Order Summary</h1>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div >
                        Item/s (<span class="itemCount">{{ $cartItems->count() }}</span>):
                    </div>

                    {{-- total price --}}
                    
                    @php
                        $totalPrice = 0;
                        foreach ($cartItems as $item) {
                            $listed_price = $item->product->price - $item->product->discount;
                            $totalPrice += $listed_price * $item->quantity;
                        }

                        $shippingFee = 100; // Example shipping fee
                        $before_tax = $totalPrice + $shippingFee;
                        $tax = $totalPrice * 0.01;
                        $total_price_w_tax = $before_tax + $tax;
                    @endphp

                    <div class="font-semibold">
                        ₱<span id="listed_price">{{ number_format($totalPrice, 2) }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div >
                        Shipping Fee:
                    </div>
                    <div class="font-semibold">
                        ₱{{ formatPrice($shippingFee) }}
                    </div>
                </div>
                {{-- Separator --}}
                <div class="relative flex py-5 items-center">
                    <div class="flex-grow border-t border-white opacity-40"></div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div >
                        Total before tax:
                    </div>
                    <div class="font-semibold">
                        ₱<span id="before_tax">{{ formatPrice($before_tax) }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div >
                        Estimated Tax(1%):
                    </div>
                    <div class="font-semibold">
                        ₱<span id="tax">{{ formatPrice($tax) }}</span>
                    </div>
                </div>
                {{-- Separator --}}
                <div class="relative flex py-5 items-center">
                    <div class="flex-grow border-t border-white opacity-40"></div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="font-bold text-accent">
                        Order Total:
                    </div>
                    <div class="font-bold text-accent">
                        ₱<span id="total_price_w_tax">{{ formatPrice($total_price_w_tax) }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-3 mb-4">
                    <div >
                        Use GCash
                    </div>
                    <div class="-mb-[0.3rem]">
                        <input type="checkbox" class="w-6 h-6">
                    </div>
                </div>
                
                <form action="{{ route('cart_checkout') }}" method="POST">
                @csrf
                    <div class="flex items-center gap-3 mb-4">
    
                        {{-- hidden inputs --}}
                        <input type="hidden" name="total_price_w_tax" value="{{ $total_price_w_tax }}">
                   
                        <button type="submit" class="btn flex-1 py-3">
                            Place Order
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</x-layout>

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.quantity-input').on('change', function() {
            const itemId = $(this).data('id');
            const newQuantity = $(this).val();
            
            console.log('ItemID:', itemId);
            console.log('New Quantity:', newQuantity);
    
            $.ajax({
                url: '{{ url("/cart/update-quantity") }}/' + itemId,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: newQuantity
                },
                success: function(response) {
                    if (response.success) {
                        // Update individual item price
                        $(`.item-price[data-id="${itemId}"]`).text(response.itemSubtotal);
                        
                        // Update cart totals
                        $('#itemCount').text(response.itemCount);
                        $('#listed_price').text(response.listed_price);
                        $('#before_tax').text(response.before_tax);
                        $('#tax').text(response.tax);
                        $('#total_price_w_tax').text(response.total_price_w_tax);
    
                        console.log('Price updated:', response.no_format_listed_price);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Update failed:', error);
                    console.log('Server response:', xhr.responseText);
                }
            });
        });
    });
    </script>