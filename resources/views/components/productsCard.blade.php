@props(['product', 'i']){{-- Singular name to match the passed variable in index.blade.php --}}


    {{-- @foreach ($products as $product) --}}
        
    <div class="card">
        {{-- Photo --}}
        <div class="">
            <img class="product-img h-80" src="{{ asset('storage/temporary-pics/tshirt'.$i.'.jpg') }}" alt="{{ $product->name }}">
        </div>  
        {{-- Details --}}
        <div class="py-3">
            <p class="opacity-30 text-sm mb-2">{{ $product->category }}</p> {{-- Category --}}
            <p class="font-bold mb-2">{{ $product->name }}</p> {{-- Product Name --}}
            <div class="flex w-full justify-center gap-2 opacity-30"> {{-- Price --}}
                <span class="text line-through"> &#8369;{{ $product->price }}</span> {{-- Original Price --}}
                <span>&#8369;{{ $product->discount }}</span> {{-- Discounted Price --}}
            </div>
        </div>
    </div>
        
    {{-- @endforeach --}}
    

