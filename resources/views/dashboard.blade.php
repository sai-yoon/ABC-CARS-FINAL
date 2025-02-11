@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-3xl font-bold text-white">Dashboard</h2>
    <p class="text-gray-400 mt-2">Welcome, {{ Auth::user()->name }}!</p>

    <!-- User Profile Section -->
    <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center mt-6">
        <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
             alt="Profile Picture" class="w-32 h-32 rounded-full mx-auto border-4 border-blue-500">
        <h3 class="text-xl text-white font-semibold mt-4">{{ Auth::user()->name }}</h3>
        <p class="text-gray-400">{{ Auth::user()->email }}</p>
        <a href="{{ route('profile.edit') }}" class="mt-4 inline-block px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 transition duration-150 ease-in-out">Edit Profile</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Post a Car -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold text-white">Post a Car for Sale</h3>
            <p class="text-gray-400 mt-2">List your used car for potential buyers.</p>
            <br>
            <a href="{{ route('cars.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-150 ease-in-out">Post Now</a>
        </div>

        <!-- View My Cars -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold text-white">Manage My Listings</h3>
            <p class="text-gray-400 mt-2">View, update, or deactivate your car listings.</p>
            <a href="{{ route('cars.userListings') }}" class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition duration-150 ease-in-out">View Listings</a>
        </div>

        <!-- Book a Test Drive -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold text-white">Book a Test Drive</h3>
            <p class="text-gray-400 mt-2">Schedule a test drive for your dream car.</p>
            <a href="{{ route('testdrives.index') }}" class="mt-4 inline-block px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition duration-150 ease-in-out">Book Now</a>
        </div>

        <!-- View Bids -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold text-white">My Bids</h3>
            <p class="text-gray-400 mt-2">See your submitted bidding prices.</p>
            <a href="{{ route('bids.index') }}" class="mt-4 inline-block px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition duration-150 ease-in-out">View Bids</a>
        </div>

        <!-- Update Profile -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold text-white">Update Profile</h3>
            <p class="text-gray-400 mt-2">Keep your profile details up to date.</p>
            <a href="{{ route('profile.edit') }}" class="mt-4 inline-block px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 transition duration-150 ease-in-out">Edit Profile</a>
        </div>

        <!-- Logout -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold text-white">Logout</h3>
            <p class="text-gray-400 mt-2">Securely log out of your account.</p>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition duration-150 ease-in-out">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection