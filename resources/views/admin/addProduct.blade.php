<x-layout>
    <div class="flex">
        <x-adminSidebar/>
        <div class="px-28 py-10 flex-1"> 
            {{-- Contents here --}}
            <div class="mb-10 justify-between gap-10 ">
                <div>
                    <h1 class="text-3xl font-bold mb-10">Add Products</h1>
                </div>
                @if(session('success'))
                <div id="success-message" class="w-full flex justify-center">
                    <div class="font-bold bg-accent text-black py-2 px-20 text-lg w-full text-center mb-10">{{ session('success') }}</div>
                </div>
                @endif  

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-2 gap-20">
                    @csrf

                    <div class="">
                        <div class="">
                            <div class="mb-4">
                                <label for="image">Product Image: @error('image') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                                <div class="file-input group">
                                    <input type="file" name="images[]" id="images" multiple accept="image/*" onchange="showPreview(event)" >
                                    <label for="image" class="border border-accent p-2 rounded-md text-base group-hover:bg-accent group-hover:text-black transition-all ease-in-out">Choose an image</label>
                                </div>
                                
                                <img id="preview" src="{{ asset('storage/' . old('image')) }}" alt="Image Preview" class="hidden mt-4 rounded-lg  h-[45rem]">
    
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="name">Product Name: @error('name') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}">
                        </div>
                       <div>
                            <label for="category">Category: @error('category') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                            <input type="text" name="category" id="category" value="{{ old('category') }}">
                       </div>
                        <div>
                            <label for="description">Description (optional): @error('description') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                            <textarea name="description" id="description" class="h-56" >{{ old('description') }}</textarea>
                        </div>
                        <div>
                            <label for="price">Price: @error('price') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                            <input type="text" name="price" id="price" value="{{ old('price') }}">
                        </div>
                        <div>
                            <label for="discount">Discount (optional): @error('discount') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                            <input type="text" name="discount" id="discount" value="{{ old('discount') }}">
                        </div>
                        <div>
                            <label for="stock">Stock: @error('stock') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                            <input type="text" name="stock" id="stock" value="{{ old('stock') }}">
                        </div>
                        <button type="submit" class="btn">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>