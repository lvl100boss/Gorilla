<x-layout>
    <div class="flex">
        <x-adminSidebar/>
        <div class="px-28 py-10 flex-1 flex flex-col gap-10"> 
            {{-- Contents here --}}
            <div class="flex items-center justify-between gap-10 ">
                <div>
                    <h1 class="text-3xl font-bold">Products</h1>
                </div>
                <div class="flex items-center flex-1">
                    {{-- Search --}}
                    <form action="{{ route('admin.products.search') }}" class="flex-1 relative" method="GET">
                        @csrf
                        <input type="text" name="search" class="!mb-0" placeholder="Search Product Name" value="{{ old('search') }}">
                        <button type="submit" class="absolute top-4 right-5">
                            <i class="fi fi-rs-search"></i>
                        </button>
                    </form>
                </div>
                
                <div class="flex items-center gap-10">
                    {{-- Add Product --}}
                    <a href="{{ route('admin_add_products') }}" class="hover:text-accent"><i class="fi fi-rs-apps-add mt-2"></i><span class="ml-3 text-lg">Add Product</span></a>
                    {{-- Filter --}}
                    <button class="flex items-center gap-4 border-y-2 pt-3 pb-2 px-4 hover:bg-white hover:text-black ease-in-out transition-all duration-200">
                        <i class="fi fi-rr-menu-burger"></i>
                        <div class="mb-1">FILTER & SORT</div>
                    </button>
                </div>
            </div>
            {{-- Product Contents here --}}
            @if ($products->isEmpty())
            
            <p>No products found.</p>
            @else
            
            @php
                $i = 1;
            @endphp

            

            <table class="table-auto">
                <tr class="bg-medium-dark">
                    <th class="text-left  p-5">No.</th>
                    <th class="text-left  p-5 w-48">Product</th>
                    <th class="text-left  p-5">Category</th>
                    <th class="text-left  p-5">Description</th>
                    <th class="text-left  p-5">Price</th>
                    <th class="text-left  p-5">Discount</th>
                    <th class="text-left  p-5">Stock</th>
                    <th class="text-left  p-5">Actions</th>
                </tr>
                @foreach ($products as $product)
                <tr class="
                    @if ($i % 2 != 0)
                        bg-light-dark
                    @else
                        bg-medium-dark
                    @endif
                    hover:bg-lightest-dark hover:text-white transition-colors duration-200 ease-in-out
                ">
                    <td class="text-center  p-5">{{ $i }}</td>
                    <td class="p-5 flex flex-col gap-4">
                        
                        <img class="product-img h-32 w-32" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
                        
                        <p class="font-semibold text-left">{{ $product->name }}</p>
                        
                    </td>
                    <td class="text-left  p-5 align-top">
                        {{ $product->category }} 
                    </td>
                    <td class="text-left  p-5 align-top">{{ $product->description }}</td>
                    <td class="text-left  p-5 align-top">&#8369;{{ $product->price }}</td>
                    <td class="text-left  p-5 align-top">&#8369;{{ $product->discount }}</td>
                    <td class="text-left  p-5 align-top">{{ $product->stock }}</td>

                    <td class="text-left p-5">
                        <div class="flex flex-col gap-10 h-full items-center justify-center">
                            <div class="">
                                <i class="fi fi-rs-pencil hover:text-accent cursor-pointer"></i>
                            </div>
                            <div class="">
                                <i class="fi fi-rs-trash hover:text-red-600 cursor-pointer"></i>
                            </div>
                        </div>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </table>
            
            @endif
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout>