<x-layout>
    <section class="max-w-screen-xl mx-auto ">
        {{-- main container --}}
        <div class="grid grid-cols-4 my-10 gap-10">
            {{-- Right Cointainer --}}
            <x-profileSidebar/>
            {{-- left container --}}
            <div class="col-span-3 bg-medium-dark rounded-md px-10 py-7 shadow-lg" style="">
                <h1 class="mb-4">WELCOME TO YOU PROFILE!</h1>
                <div class=" grid grid-cols-3 gap-10 mb-6">
                    <div class="bg-light-dark flex flex-col items-center justify-center p-8 rounded-md shadow-lg">
                        <div class="bg-accent text-black w-16 h-16 rounded-full relative mb-4">
                            <i class="fi fi-rr-shopping-cart absolute top-5 right-[1.4rem] text-xl font-bold"></i>
                        </div>
                        <div>
                            <p class="text-4xl font-bold mb-4">06</p>
                            <p class="text-sm opacity-40">Pending Orders</p>
                        </div>
                    </div>
                    <div class="bg-light-dark flex flex-col items-center justify-center p-8 rounded-md shadow-lg">
                        <div class="bg-accent text-black w-16 h-16 rounded-full relative mb-4">
                            <i class="fi fi-rr-time-fast absolute top-5 right-[1.4rem] text-xl font-bold"></i>
                        </div>
                        <div>
                            <p class="text-4xl font-bold mb-4">44</p>
                            <p class="text-sm opacity-40">Orders Completed</p>
                        </div>
                    </div>
                    <div class="bg-light-dark flex flex-col items-center justify-center p-8 rounded-md shadow-lg">
                        <div class="bg-accent text-black w-16 h-16 rounded-full relative mb-4">
                            <i class="fi fi-rr-ballot absolute top-5 right-[1.4rem] text-xl font-bold"></i>
                        </div>
                        <div>
                            <p class="text-4xl font-bold mb-4">50</p>
                            <p class="text-sm opacity-40">Total Orders</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex mb-8 items-center justify-between">
                        <h1 class=" text-xl font-semi-bold">PROFILE INFORMATION</h1>
                        <button class="btn shadow-lg">Edit</button>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Name:</p>
                        <p class="col-span-5 text-left">John Smithing S. Doe</p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Email:</p>
                        <p class="col-span-5 text-left">example@gmail.com</p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Phone:</p>
                        <p class="col-span-5 text-left">0969-420-6560</p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">City:</p>
                         <p class="col-span-5 text-left">Zamboanga</p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Country:</p>
                        <p class="col-span-5 text-left">Philippines</p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Address:</p>
                        <p class="col-span-5 text-left">WMSU, Normal Rd, Baliwasan, Zamboanga, Philippines</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
