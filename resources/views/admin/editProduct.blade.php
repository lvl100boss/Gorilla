<x-layout>
    <div class="flex">
        <x-adminSidebar/>
        <div class="px-28 py-10 flex-1"> 
            {{-- Contents here --}}
            <div class="container">
                <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
            
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-20">
                    @csrf
                    @method('PUT')

                    <div>
                        <div class="mb-4">
                            <label for="image">Image (optional):</label>
                            <div class="file-input group">
                                <input type="file" name="image" id="image" accept="image/*" onchange="showPreview(event)">
                                <label for="image" class="border border-accent p-2 rounded-md text-base group-hover:bg-accent group-hover:text-black transition-all ease-in-out">Choose an image</label>
                            </div>
                            
                            <!-- Display the current image or the selected image -->
                            <img id="preview" src="{{ asset('storage/' . $product->image) }}" class="mt-4 rounded-lg  h-[45rem]" alt="Image Preview">
                            
                            @error('image') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="name" >Product Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full p-2 border border-gray-300 rounded-lg">
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="category" >Category:</label>
                            <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}" class="w-full p-2 border border-gray-300 rounded-lg">
                            @error('category') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="description" >Description:</label>
                            <textarea name="description" id="description" class="h-56">{{ old('description', $product->description) }}</textarea>
                            @error('description') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="price" >Price:</label>
                            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full p-2 border border-gray-300 rounded-lg">
                            @error('price') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="discount" >Discount:</label>
                            <input type="text" name="discount" id="discount" value="{{ old('discount', $product->discount) }}" class="w-full p-2 border border-gray-300 rounded-lg">
                            @error('discount') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="stock" >Stock:</label>
                            <input type="text" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="w-full p-2 border border-gray-300 rounded-lg">
                            @error('stock') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <button type="submit" class="btn">Update Product</button>
                    </div>
            
                </form>
        </div>
    </div>
    
</x-layout>