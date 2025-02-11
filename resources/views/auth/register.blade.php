@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen" style="background-color: #241b35;">
        <div class="w-full max-w-md p-8 rounded-lg shadow-md" style="background-color: #342a45;">
            <h2 class="text-2xl font-bold text-center mb-6" style="color: #ffffff;">Register</h2>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm" style="color: #a364ff;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block font-bold mb-2" style="color: #e0e0e0;">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="w-full p-3 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-color:#6c35de;">
                    @error('name')
                        <p class="text-sm mt-1" style="color: #373737;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" class="block font-bold mb-2" style="color: #e0e0e0;">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="w-full p-3 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-color:#6c35de;">
                    @error('email')
                        <p class="text-sm mt-1" style="color: #373737;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-bold mb-2" style="color: #e0e0e0;">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full p-3 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-color:#6c35de;">
                    @error('password')
                        <p class="text-sm mt-1" style="color: #373737;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block font-bold mb-2" style="color: #e0e0e0;">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full p-3 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-color:#6c35de;">
                    @error('password_confirmation')
                        <p class="text-sm mt-1" style="color: #373737;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button type="submit" style="background-color: #6c35de; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s ease-in-out;" onmouseover="this.style.background='#a364ff'" onmouseout="this.style.background='#6c35de'">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection

