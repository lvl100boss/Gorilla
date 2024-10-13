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
                
                    <div id="previeContainer">
                        <div class="mb-4">
                            <label for="images">Images (optional):</label>
                            <div class="file-input group">
                                <input type="file" name="images[]" id="images" multiple accept="image/*" onchange="showPreview(event)">
                                <label for="images" class="border border-accent p-2 rounded-md text-base group-hover:bg-accent group-hover:text-black transition-all ease-in-out">Choose Images</label>
                            </div>
                
                            <!-- Display current images -->
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="mt-2 max-w-xs" alt="Product Image">
                            @endforeach
                
                            @error('images.*') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                
                    <div>
                        <div class="mb-4">
                            <label for="name">Product Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="category">Category:</label>
                            <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
                            @error('category') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="h-56">{{ old('description', $product->description) }}</textarea>
                            @error('description') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="price">Price:</label>
                            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
                            @error('price') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="discount">Discount:</label>
                            <input type="text" name="discount" id="discount" value="{{ old('discount', $product->discount) }}" class="w-full p-2 border border-gray-300 rounded-lg">
                            @error('discount') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="stock">Stock:</label>
                            <input type="text" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
                            @error('stock') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                
                        <button type="submit" class="btn">Update Product</button>
                    </div>
                </form>
                
        </div>
    </div>
    
    <script>
        window.showPreview = function(event) {
            const previewContainer = document.getElementById('previewContainer'); // Ensure you have this container in your HTML
            previewContainer.innerHTML = ''; // Clear previous previews
            const files = event.target.files; // Get the selected files
    
            // Loop through all selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    const img = document.createElement('img'); // Create an image element
                    img.src = e.target.result; // Set the image source to the file data
                    img.className = 'mt-2 max-w-xs'; // Add any classes you want for styling
                    previewContainer.appendChild(img); // Append the image to the preview container
                }
    
                if (file) {
                    reader.readAsDataURL(file); // Convert the file to base64 URL
                }
            }
        }
    </script>
</x-layout>