@extends('layouts.app')

@section('content')

@if(session('error'))
    <div class="bg-red-600 text-white p-3 mb-4 rounded">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="bg-green-600 text-white p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<!-- Search Form -->
<form method="GET" action="{{ route('cars.index') }}" class="mb-6 p-4 bg-gray-800 shadow-lg rounded-lg">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <input type="text" name="make" placeholder="Make" value="{{ request('make') }}"
               class="p-2 border rounded w-full bg-gray-200 text-gray-700">
        <input type="text" name="model" placeholder="Model" value="{{ request('model') }}"
               class="p-2 border rounded w-full bg-gray-200 text-gray-700">
        <input type="number" name="year" placeholder="Year" value="{{ request('year') }}"
               class="p-2 border rounded w-full bg-gray-200 text-gray-700">
        <div class="flex space-x-2">
            <input type="number" name="min_price" placeholder="Min Price" value="{{ request('min_price') }}"
                   class="p-2 border rounded w-full bg-gray-200 text-gray-700">
            <input type="number" name="max_price" placeholder="Max Price" value="{{ request('max_price') }}"
                   class="p-2 border rounded w-full bg-gray-200 text-gray-700">
        </div>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-4 hover:bg-blue-700 transition duration-150 ease-in-out">Search</button>
</form>

<!-- Cars for Sale Section -->
@if($cars->where('is_for_bidding', false)->count() > 0)
    <h2 class="text-2xl font-bold mb-4 text-white">Cars for Sale</h2>
    <div class="grid grid-cols-3 gap-6">
    @foreach($cars->where('is_active', true)->where('is_for_bidding', false) as $car)
            <div class="border rounded-lg p-4 bg-gray-800 shadow-lg  hover:shadow-lg transition duration-150 ease-in-out">
                <img src="{{ asset('storage/' . $car->image) }}" class="w-full h-40 object-cover rounded-lg mb-3">
                <h3 class="text-xl font-semibold text-white">{{ $car->make }} {{ $car->model }}</h3>
                <p class="text-white">Year: {{ $car->year }}</p>
<p class="text-white">Mileage: {{ number_format($car->mileage) }} km</p>
<p class="text-white">Price: ${{ number_format($car->price, 2) }}</p>
            </div>
        @endforeach
    </div>
@else
    <p class="text-white">No cars available for sale.</p>
@endif

<!-- Cars for Bidding Section -->
@if($cars->where('is_for_bidding', true)->count() > 0)
    <h2 class="text-2xl font-bold mt-8 mb-4 text-white">Cars Available for Bidding</h2>
    <div class="grid grid-cols-3 gap-6">
        @foreach($cars->where('is_for_bidding', true) as $car)
            <div class="border rounded-lg p-4 bg-gray-800 shadow-lg hover:shadow-lg transition duration-150 ease-in-out">
                <img src="{{ asset('storage/' . $car->image) }}" class="w-full h-40 object-cover rounded-lg mb-3">
                <h3 class="text-xl font-semibold text-white">{{ $car->make }} {{ $car->model }}</h3>
                <p class="text-white">Year: {{ $car->year }}</p>
                <p class="text-white">Mileage: {{ number_format($car->mileage) }} km</p>
                <p class="text-white">Starting Price: ${{ number_format($car->price, 2) }}</p>
                
                <!-- Bidding Form -->
                <form action="{{ route('bidding.submit', $car->id) }}" method="POST">
                    @csrf
                    <label for="bid_amount" class="block font-medium text-white">Your Bid Amount</label>
                    <input type="number" name="bid_amount" min="1" required class="mt-2 p-2 border rounded w-full bg-gray-200 text-gray-700">
                    <button type="submit" class="bg-[#6c35de] text-white py-2 px-4 rounded mt-4 hover:bg-[#a364ff] transition duration-150 ease-in-out">Place Bid</button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <p class="text-gray-500">No cars available for bidding.</p>
@endif

@endsection