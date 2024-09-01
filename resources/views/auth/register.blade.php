<x-layout>
    <div class="max-w-screen-xl mx-auto mt-16 flex justify-center h-dvh">
        <div class="w-1/3 flex flex-col gap-4">
            <h1 class="text-left font-bold text-6xl mb-4"><span class="text-accent">Sign Up</span> to start shopping</h1>

            <div class="flex flex-col justify-center">
                <form class="mb-8" action="{{ route('register') }}" method="post">
                    @csrf
                    {{-- Username --}}
                    <div class="mb-7">
                        <label for="username">Username @error('username') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                    </div>
                
                    {{-- Email --}}
                    <div class="mb-7">
                        <label for="email">Email @error('email') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                
                    {{-- Password --}}
                    <div class="mb-12">
                        <label for="password">Password @error('password') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                        <input type="password" name="password" placeholder="Password">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                
                    {{-- Submit --}}
                
                    <button type="submit" class="btn w-full py-4 text-bold rounded-md links">Sign Up</button>
                </form>

                <div>
                    <p class="">Already have an account?
                        <span class="font-semibold underline hover:text-accent transition-colors">
                            <a href="{{ route('login') }}">Sign In Here.</a> 
                        </span>
                    </p> 
                </div>
            </div>
        </div>
    </div>
</x-layout>