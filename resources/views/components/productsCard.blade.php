<div class="grid grid-cols-5 gap-x-5 gap-y-8">
    {{-- cards --}}
    @for ($i = 1; $i <= 20; $i++)
        <div class="card">
            {{-- Photo --}}
            <div class="">
                <img class="product-img h-80" src="{{ asset('storage/temporary-pics/tshirt' . $i . '.jpg') }}" alt="IMG">
            </div>
            {{-- Details --}}
            <div class="py-3">
                <p class="opacity-30 text-sm mb-2">Tshirts</p> {{-- Category --}}
                <p class="font-bold mb-2">Plain Sample Tshirt</p> {{-- Product Name --}}
                <div class="flex w-full justify-center gap-2 opacity-30"> {{-- Price --}}
                    <span class="text line-through">₱600.00</span> {{-- Original Price --}}
                    <span>₱499.00</span> {{-- Discounted Price --}}
                </div>
            </div>
        </div>
    @endfor
    
</div>