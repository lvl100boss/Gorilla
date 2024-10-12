<x-layout>
    Shopping cart

    @foreach ($cartItems as $item)
    <div>
        <h2 class="text-base">{{ $item->name }}</h2>
        <p>Price: &#8369;{{ $item->price }}</p>
        <p>Category: {{ $item->category }}</p>
        <img src="{{ asset('storage/'. $item->image) }}" alt="{{ $item->name }}" width="100">
        <p>Quantity: {{ $item->quantity}}pcs </p>
        
    </div>
    @endforeach

</x-layout>