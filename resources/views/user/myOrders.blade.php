<x-layout>
    <section class="max-w-screen-xl mx-auto ">
        {{-- main container --}}
        <div class="grid grid-cols-4 my-10 gap-10">
            {{-- Right Cointainer --}}
            <x-profileSidebar/>
            {{-- left container --}}
            <div class="col-span-3 bg-medium-dark rounded-md px-7 py-7 shadow-lg" >
                <div>
                    <form action="" class="grid grid-cols-3 items-center gap-20">
                        @csrf
                        <div class="relative">
                            <input type="search" name="search" id="search" placeholder="Search" class="!bg-light-dark !p-2 !mb-0 shadow-lg">
                            <i class="fi fi-rs-search absolute top-[0.7rem] right-3 text-sm cursor-pointer hover:text-accent"></i>
                        </div>
                        <h1 class="font-semibold text-lg text-center">MY ORDER LIST</h1>
                        <div class="flex items-center gap-3 justify-end">
                            <button class="relative bg-light-dark py-2 px-4 text-sm rounded-md flex items-center gap-3 justify-center hover:bg-lightest-dark hover:text-accent shadow-lg">
                                <span>Filter</span>
                                <i class="fi fi-rs-settings-sliders -mb-1"></i>
                            </button>
                            <button class="relative bg-light-dark py-2 px-4 text-sm rounded-md flex items-center gap-3 justify-center hover:bg-lightest-dark hover:text-accent shadow-lg">
                                <span>Sort</span>
                                <i class="fi fi-rs-sort-amount-down -mb-[0.5rem]"></i>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="grid grid-cols-17 px-3 py-4 bg-accent text-black my-3 rounded-md">
                    <div class="font-semibold text-sm col-span-1">#</div>
                    <div class="font-semibold text-sm col-span-2">Order ID</div>
                    <div class="font-semibold text-sm col-span-2">Product Name</div>
                    <div class="font-semibold text-sm col-span-2">Items</div>
                    <div class="font-semibold text-sm col-span-2">Price</div>
                    <div class="font-semibold text-sm col-span-2">Paid</div>
                    <div class="font-semibold text-sm col-span-2">Date</div>
                    <div class="font-semibold text-sm col-span-2">Status</div>
                    <div class="font-semibold text-sm col-span-2">Action</div>
                </div>
                @for ($i = 1; $i <= 10; $i++)
                <div class="grid grid-cols-17 px-3 py-4 bg-light-dark mb-3 rounded-md shadow-lg ">
                    <div class="text-sm col-span-1">{{ $i }}</div>
                    <div class="text-sm col-span-2">Order ID</div>
                    <div class="text-sm col-span-2">Product Name</div>
                    <div class="text-sm col-span-2">Items</div>
                    <div class="text-sm col-span-2">Price</div>
                    <div class="text-sm col-span-2">Paid</div>
                    <div class="text-sm col-span-2">Date</div>
                    <div class="text-sm col-span-2">Status</div>
                    <div class="text-sm col-span-2">Action</div>
                </div>    
                @endfor
            </div>
        </div>
    </section>
</x-layout>