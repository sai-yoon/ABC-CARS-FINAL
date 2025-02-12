@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen" style="background-color: #241b35;">
        <div class="w-full max-w-md p-8 rounded-lg shadow-md" style="background-color: #342a45;">
            
            <!-- ABC Cars Logo -->
            <div class="flex justify-center mb-4">
    <img src="{{ asset('images/abccarslogo.png') }}" alt="ABC Cars Logo" class="h-32 w-32">
</div> 

<h2 class="text-2xl font-bold text-center mb-4" style="color: #ffffff;">Login</h2>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm" style="color: #a364ff;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-bold mb-2" style="color: #e0e0e0;">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="w-full p-3 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-color:#6c35de;">
                    @error('email')
                        <p class="text-sm mt-1" style="color: #e0e0e0;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-bold mb-2" style="color: #e0e0e0;">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full p-3 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-color:#6c35de;">
                    @error('password')
                        <p class="text-sm mt-1" style="color: #373737;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-color:#6c35de shadow-sm focus:ring-color:#6c35de" name="remember">
                        <span class="ml-2 text-sm" style="color: #e0e0e0;">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm" style="color: #a364ff;" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit" style="background-color: #6c35de; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s ease-in-out;" onmouseover="this.style.background='#a364ff'" onmouseout="this.style.background='#6c35de'">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
