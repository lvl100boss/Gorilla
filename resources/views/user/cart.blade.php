{{-- This is Only for static purposes --}}
@php
function formatPrice($price) {
    return number_format($price, 2, '.', ',');
}
$images = [
    '1atDc9frfsfU4gC1mbADcmfflwr3fHS6yltQE18W.jpg',
    '1P3v3AAuINcimsLxQYuIhvfSyfUpy62TeIkhXMGV.jpg',
    '5ugfVZ5gzjCUqI6PeBpL6qP0soLbKgZTEYO25sW7.jpg',
    'P1MDskbXDCqlmaIMMuIgxGgVEsIv8JhcXTGQ9YaF.webp',
    'JVK9KIhq3seGeuirQo0YAkmOCif8iXhRhjoFdtBs.jpg'
];
$shirtNames = [
    'Plain Black Beige',
    'Top Sleeveless',
    'Tea Plain Shirt',
    'Red Polo Shirt',
    'Macha Sweater'
];
$sizes = [
    'Large',
    'Medium',
    'Extra Large',
    'Large',
    'Small'
];
$prices = [
    998,
    798,
    399,
    400,
    399
];
$quantity = [1,3,2,1,5];
$totalPrice = 0;
$shippingFee = 100;
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
                <div class="mb-6">
                    <h6 class="text-sm opacity-40">You have 5 items in your cart</h6>
                </div>
                {{-- container for the items --}}
                <div>
                    
                    {{-- the Item --}}
                    
                    @for ($i = 0; $i < count($shirtNames); $i++)
                        @php
                            $itemTotal = $prices[$i] * $quantity[$i];
                            $totalPrice += $itemTotal;
                        @endphp
                        <div class="bg-light-dark p-3 rounded-md flex items-center justify-between cursor-pointer hover:scale-[1.01] hover:shadow-xl shadow-lg transition-transform ease-in-out mb-4">
                            <div class="flex items-center gap-3">
                                <div>
                                    <img class="h-14 w-14 rounded-md" src="{{ asset('storage/images/' . $images[$i]) }}" alt="{{ $shirtNames[$i] }}">
                                </div>
                                <div>
                                    <p class="text-left text-sm">{{ $shirtNames[$i] }}</p>
                                    <p class="text-left text-sm opacity-40">Size: {{ $sizes[$i] }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-8 mr-3">
                                {{-- Quantity --}}
                                <p class="text-sm">{{ $quantity[$i] }}</p>
                                {{-- Price --}}
                                <p class="text-sm w-10 text-left">₱{{ $itemTotal }}</p>
                                {{-- Remove Icon --}}
                                <button>
                                    <i class="fi fi-rs-trash text-sm hover:text-red-600 cursor-pointer"></i>
                                </button>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            {{-- Right Box --}}
            <div class="col-span-2 mr-4">
                <div class="mb-6">
                    <h1 class="text-lg font-semibold py-1">Order Summary</h1>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div >
                        Item/s(5):
                    </div>
                    <div class="font-semibold">
                        ₱{{ formatPrice($totalPrice) }}
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
                        ₱{{ formatPrice($totalPrice += $shippingFee) }}
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div >
                        Estimated Tax(1%):
                    </div>
                    <div class="font-semibold">
                        ₱{{ formatPrice($tax = $totalPrice * 0.01) }}
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
                        ₱{{ formatPrice($totalPrice += $tax) }}
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
                <div class="flex items-center gap-3 mb-4">
                    <button type="submit" class="btn flex-1 py-3">
                        Place Order
                    </button>
                </div>
            </div>
        </div>
    </section>
</x-layout>