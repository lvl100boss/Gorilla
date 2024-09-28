<x-layout>
    <section>
        <div class="max-w-screen-xl mx-auto pb-20 mb-5">
            {{-- Title --}}
            <div class="flex w-full justify-center pt-20 pb-10">
                <h1 class="text-3xl font-bold test">PRO<span class="text-accent">DUCTS</span></h1>
            </div>
            <div class="mb-14 flex  justify-between">
                {{-- Filter Button --}}
                <button class="flex items-center gap-4 border-y-2 pt-1 px-4 hover:bg-white hover:text-black ease-in-out transition-all duration-200">
                    <i class="fi fi-rr-menu-burger"></i>
                    <div class="mb-1">FILTER & SORT</div>
                </button>
            
                {{-- Search Bar --}}
                <form class="w-96 relative !mb-0" method="GET" action="{{ route('searchProducts') }}">
                    @csrf
                    <input class="!mb-0" type="text" name="search" id="search" placeholder="Search Product">
                    <button type="submit" class="!mb-0  absolute right-5 top-4">
                        <i class="fi fi-rr-search"></i>
                    </button>
                </form>
            </div>
        {{-- Cards --}}
            {{-- Demonstration --}}
            @if ($products->isEmpty())
            <p>No products found.</p>
            @else
            <div class="grid grid-cols-5 gap-x-5 gap-y-8 mb-8">
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $product)
                    <x-productsCard :product="$product" :i="$i" />
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
            @endif
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </section>
</x-layout>