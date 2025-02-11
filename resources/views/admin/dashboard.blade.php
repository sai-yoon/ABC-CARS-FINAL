@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-3xl font-bold text-white">Admin Dashboard</h2>
    <p class="text-white     mt-2">Welcome, {{ Auth::user()->name }} (Admin)!</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- View Registered Users -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl text-white font-semibold">Manage Users</h3>
            <p class="text-gray-400 mt-2">View and manage registered users.</p>
            <a href="{{ route('admin.users') }}" 
               class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                View Users
            </a>
        </div>

        <!-- Manage Car Listings -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl text-white font-semibold">Manage Car Listings</h3>
            <p class="text-gray-400 mt-2">Activate or deactivate car posts.</p>
            <a href="{{ route('admin.cars') }}" 
               class="mt-4 inline-block px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
                Manage Cars
            </a>
        </div>

        <!-- Approve/Deny Test Drives -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl text-white font-semibold">Test Drive Appointments</h3>
            <p class="text-gray-400 mt-2">Approve or reject test drive requests.</p>
            <a href="{{ route('admin.testdrives') }}" 
               class="mt-4 inline-block px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                Manage Appointments
            </a>
        </div>

        <!-- Manage Bidding -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl text-white font-semibold">Manage Bids</h3>
            <p class="text-gray-400 mt-2">Review and approve bid transactions.</p>
            <br>
            <a href="{{ route('admin.bids') }}" 
               class="mt-4 inline-block px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
                Manage Bids
            </a>
        </div>

        <!-- Logout -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 text-center">
            <h3 class="text-xl text-white font-semibold">Logout</h3>
            <p class="text-gray-400 mt-2">Securely log out of your admin account.</p>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
