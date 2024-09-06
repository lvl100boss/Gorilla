<x-layout>
    <section class="index-sect1-bg-img">
        <div class="section1 flex items-end pt-40  h-full flex-col ">
            <div class="section-container flex flex-col items-center justify-center outline outline-green-500 outline-0">
                <h1 class="punchline text-6xl mb-8 -ml-1">CLOTHING FOR FASHIONISTA'S TASTE</h1>
                <p class="text-xl mb-10 ">Unleash your style. Discover clothes that reflect your unique spirit. Explore Now!</p>
    
                <x-uniquebutton>Shop now</x-uniquebutton>
                
            </div>
        </div>
    </section>
    <section class="mt-10 pb-20">
        
        
        <div class="max-w-screen-xl mx-auto pb-14">
            <div class="flex w-full justify-center pt-20 pb-10">
                <h1 class="text-3xl font-bold test">FEATURED <span class="text-accent">PRODUCTS</span></h1>
            </div>
            
            {{-- <p>{{ $name }}</p> --}}

            
            @if ($products->isEmpty())
                <p>No products found.</p>
            @else
            <div class="draggable-container flex overflow-x-auto  hover:overflow-y-scroll gap-5 p-4 active:cursor-grabbing select-none">
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $product)
                    <div class="min-w-[14.6rem] cursor-pointer active:pointer-events-none ">
                        <x-productsCard :product="$product" :i="$i" />
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
            @endif
            
        </div>
        <p>
            <a class="underline text-accent" href="{{ route('products') }}">View more</a>
        </p>
    </section>
</x-layout>