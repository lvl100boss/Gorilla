@props(['product', 'i']){{-- Singular name to match the passed variable in index.blade.php --}}


    {{-- @foreach ($products as $product) --}}
        @php
            $listed_price = $product->price - $product->discount;
            $discount_percent = ($product->discount / $product->price) * 100;
            $discount_percent = round($discount_percent);
        @endphp
    <a href="{{ route('preview') }}">
        <div class="card cursor-pointer group">
            {{-- Photo --}}
            <div class="overflow-hidden relative">
                @if ($product->images->isNotEmpty())
                    <img class="product-img h-80 group-hover:scale-110 transition-transform ease-in-out" src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}">
                @endif
                @if ($discount_percent >= 1)
                    <div class="absolute top-2 right-0 bg-medium-dark text-white px-2 py-1 rounded-sm text-xs">{{ $discount_percent }}% OFF</div> {{-- Discount Badge --}}
                @endif
            </div>  
            {{-- Details --}}
            <div class="p-3">
                <p class="opacity-30 text-sm mb-2">{{ $product->category }}</p> {{-- Category --}}
                <p class="font-bold mb-2 truncate hover:text-clip overflow-flow">{{ $product->name }}</p> {{-- Product Name --}}
                <div class="flex w-full justify-center gap-2 "> {{-- Price --}}
                    @if ($product->discount > 0)
                        <span class="text line-through opacity-30"> &#8369;{{ $product->price }}</span> {{-- Original Price --}}   
                    @endif
                    <span class="opacity-70">&#8369;{{ $listed_price }}</span> {{-- Discounted Price --}}
                </div>
            </div>
        </div>
    </a>
        
    {{-- @endforeach --}}
    

