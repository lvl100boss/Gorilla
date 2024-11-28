<x-layout>
    <section class="max-w-screen-xl mx-auto ">
        {{-- main container --}}
        <div class="grid grid-cols-4 my-10 gap-10">
            {{-- Right Cointainer --}}
            <x-profileSidebar :user="$user"/>
            {{-- left container --}}
            <div class="col-span-3 bg-medium-dark rounded-md px-10 py-7 shadow-lg" style="">
                <h1 class="mb-4">WELCOME TO YOUR PROFILE {{ Str::upper($user->username) }}!</h1>
                <div class=" grid grid-cols-3 gap-10 mb-6">
                    <div class="bg-light-dark flex flex-col items-center justify-center p-8 rounded-md shadow-lg">
                        <div class="bg-accent text-black w-16 h-16 rounded-full relative mb-4">
                            <i class="fi fi-rr-shopping-cart absolute top-5 right-[1.4rem] text-xl font-bold"></i>
                        </div>
                        <div>
                            <p class="text-4xl font-bold mb-4">
                                {{ $user_order->count() }}
                            </p>
                            <p class="text-sm opacity-40">Pending Orders</p>
                        </div>
                    </div>
                    <div class="bg-light-dark flex flex-col items-center justify-center p-8 rounded-md shadow-lg">
                        <div class="bg-accent text-black w-16 h-16 rounded-full relative mb-4">
                            <i class="fi fi-rr-time-fast absolute top-5 right-[1.4rem] text-xl font-bold"></i>
                        </div>
                        <div>
                            <p class="text-4xl font-bold mb-4">0</p>
                            <p class="text-sm opacity-40">Orders Completed</p>
                        </div>
                    </div>
                    <div class="bg-light-dark flex flex-col items-center justify-center p-8 rounded-md shadow-lg">
                        <div class="bg-accent text-black w-16 h-16 rounded-full relative mb-4">
                            <i class="fi fi-rr-ballot absolute top-5 right-[1.4rem] text-xl font-bold"></i>
                        </div>
                        <div>
                            <p class="text-4xl font-bold mb-4">
                                {{ $user_order->count() }}
                            </p>
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
                        <p class="col-span-5 text-left">
                            @if ($user->name)
                                {{ $user->name }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Email:</p>
                        <p class="col-span-5 text-left">
                            @if ($user->email)
                                {{ $user->email }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Phone:</p>
                        <p class="col-span-5 text-left">
                            @if ($user->phone)
                                {{ $user->phone }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">City:</p>
                         <p class="col-span-5 text-left">
                            @if ($user->city)
                                {{ $user->city }}
                            @else
                                None
                            @endif
                         </p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Country:</p>
                        <p class="col-span-5 text-left">
                            @if ($user->country)
                                {{ $user->country }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-6 mb-4">
                        <p class="col-span-1 text-left">Address:</p>
                        <p class="col-span-5 text-left">
                            @if ($user->address)
                                {{ $user->address }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>