<x-layout>
    <div class="max-w-screen-xl mx-auto">
        <div class="grid grid-cols-2 my-10 gap-20">
            <div>
                <img class="h-[45rem]" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div>
                <h1 class="font-bold text-4xl mb-8">{{ $product->name }}</h1>
                <div class="flex gap-4 items-center mb-8">
                    <p class="text-left text-3xl">₱{{ $product->price }}</p>
                    <p class="text-left opacity-40 line-through">₱{{ $product->price + $product->discount}}</p>
                </div>
                <div class="mb-8">
                    <p class="text-left text-pretty">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="mb-16">
                    <form action="{{ route('cart_store', $product->id) }}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
                        <div class="grid grid-cols-2 gap-4 items-center  mb-8">
                            <div class="flex items-center gap-4">
                                <label for="size" class="mb-0 text-lg">Size</label>
                                <select class="bg-medium-dark p-3 flex-1 rounded-md" name="size" id="size">
                                    <option value="xs">Extra Small</option>
                                    <option value="sm">Small</option>
                                    <option value="md">Medium</option>
                                    <option value="lg">Large</option>
                                    <option value="xl">Extra Large</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-4 ">
                                <label for="quantity" class="mb-0 text-lg">Quantity</label>
                                <input class="bg-medium-dark p-2 flex-1 rounded-md !mb-0" type="text" name="quantity" id="quantity">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center gap-4 ">
                                <button type="submit" class="btn flex-1 py-3">Add to cart</button>
                            </div>
                            <div class="flex items-center gap-4 ">
                                <button class="btn flex-1 py-3">Buy Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex items-center gap-2 mb-8">
                    <h6 class="text-lg font-semibold">Category:</h6>
                    <p class="text-left text-lg text-accent cursor-pointer">Dress, Women</p>
                </div>
                <div>
                    <h6 class="text-lg font-semibold mb-2">Free shipping on orders over ₱800!</h6>
                    <p class="text-left mb-2">- No-Risk Money Back Guarantee!</p>
                    <p class="text-left mb-2">- No Hassle Refunds</p>
                    <p class="text-left mb-2">- Secure Payments</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>