<x-layout>
    <div class="max-w-screen-xl mx-auto">
        <h1>Shopping Cart</h1>
        
        @if ($cartItems->isEmpty())
            <p>Your cart is empty. Add some products!</p>
        @else
            @foreach ($cartItems as $item) {{-- Changed $items to $item for consistency --}}
                {{-- <x-productsCard :product="$item->product" :quantity="$item->quantity" /> --}}
                    
                <div>
                    <p>Product Name: {{$item->product->name}} </p>
                    <img src="{{ asset('storage/'. $item->product->image) }}" alt="{{ $item->product->image }}">
                    <p>Category: {{$item->product->category}} </p>

                    @php
                        $listed_price = $item->product->price - $item->product->discount;
                    @endphp

                    <p>Listed Price: {{$listed_price}} </p>
                    <p>Quantity: {{$item->quantity}} </p>

                </div>
            @endforeach
        @endif
    </div>
</x-layout>