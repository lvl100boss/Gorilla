<x-layout>
    <form action="{{ route('cart.store') }}" method="post">
        @csrf

        <img class="h-96 w-96 object-cover" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
        
        @php
            $listed_price = $product->price - $product->discount;
            $discount_percent = ($product->discount / $product->price) * 100;
            $discount_percent = round($discount_percent);
        @endphp
        
        @if ($discount_percent >= 1)
            <div>{{ $discount_percent }}% OFF</div>
        @endif
        
        <div>
            <div>{{ $product->category }}</div>
            <div>{{ $product->name }}</div>
            
            @if ($product->discount > 0)
                <div>{{ $product->price }}</div>
            @endif
            
            <!-- Hidden input for the product ID -->
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <!-- Input for product quantity -->
            <input type="number" name="quantity">

            <button type="submit">Add to Cart</button>
        </div>
    </form method="post">
</x-layout>
