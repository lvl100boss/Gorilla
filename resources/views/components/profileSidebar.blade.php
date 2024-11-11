<div class="col-span-1">
    {{-- Conintainer of Profile Pic --}}
    <div class="
        bg-medium-dark 
        py-8  
        flex 
        justify-center 
        flex-col 
        items-center
        rounded-md
        mb-4
        shadow-lg
    ">
        {{-- Profile Image --}}
        {{-- src="https://picsum.photos/200/300/?blur=3" --}}
        {{-- src="{{ asset('storage/temporary-pics/nice.png') }}" --}}
        <img src="{{ asset('storage/temporary-pics/nice.png') }}" alt="Profile Picture" 
        class="
            w-[10rem]
            h-[10rem]
            rounded-full
            mb-5
        ">
        <p class="text-center mb-2 ">John Smithing S. Doe</p>
        <p class="text-center opacity-40 text-sm">Zamboanga, Philippines</p>
    </div>
    {{-- Profile Button Container --}}
    <a href="{{ route('profile') }}">
        <button class="
            bg-medium-dark 
            w-full
            mb-4
            py-4
            px-10
            text-sm
            text-left
            rounded-md
            hover:bg-light-dark 
            hover:text-accent
            shadow-lg
        ">
            <i class="fi fi-rs-user mr-2"></i>
            Profile
        </button>
    </a>
    <a href="{{ route('myOrders') }}">
        <button class="
            bg-medium-dark 
            w-full
            mb-4
            py-4
            px-10
            text-sm
            text-left
            rounded-md 
            hover:bg-light-dark 
            hover:text-accent
            shadow-lg
        ">
            <i class="fi fi-rr-shopping-basket mr-2"></i>
            My Orders
        </button>
    </a>
</div>