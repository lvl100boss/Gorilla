<x-layout>
    <div class="max-w-screen-xl mx-auto mt-28 flex justify-center h-dvh" >
        <div class="w-1/3 flex flex-col gap-4 outline outline-green-500 outline-0">
            <h1 class="text-center font-bold text-7xl mb-4 font-PSDisplay italic -ml-4 " style="letter-spacing: 0.45rem"><span class="text-accent">WELCOME</span> BACK!</h1>

            <div class="flex flex-col justify-center">
                <form class="mb-8" action="{{ route('login') }}" method="post">
                    @csrf
                    {{-- Email --}}
                    <div class="mb-7">
                        <label class="" for="email">Email @error('email') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label> 
                        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" class="@error('email') !ring-red-500 @enderror">
                    </div>
                
                    {{-- Password --}}
                    <div class="mb-16">
                        <label for="password">Password @error('password') <span class="error text-left ml-2">{{ $message }}</span> @enderror</label>
                        <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" class="@error('password') !ring-red-500 @enderror">
                    </div>
                
                    {{-- Remember CheckBox --}}
                    <div class="mb-6 flex gap-2 items-center">
                        <input class="" type="checkbox" name="remember" id="remember">
                        <label class="mb-0" for="remember">Remember me</label>
                    </div>
                
                    
                
                    {{-- Submit --}}
                
                    <button type="submit" class="btn w-full py-4 text-bold rounded-md links outline outline-accent outline-offset-4 outline-1">Log in</button>
                    @error('failed')
                        <div class="my-4 bg-red-500 py-2">
                            <p class="text-white">- {{ $message }} -</p>
                        </div>
                     @enderror
                </form>

                <div>
                    <p class="">Don't have an account yet? 
                        <span class="font-semibold underline hover:text-accent transition-colors">
                            <a href="{{ route('register') }}">Sign up here.</a> 
                        </span>
                    </p> 
                </div>
            </div>
        </div>
    </div>
</x-layout>