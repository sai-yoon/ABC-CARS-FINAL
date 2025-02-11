@extends('layouts.app')

@section('content')
@if(session('error'))
    <div class="bg-red-500 text-white p-3 mb-4 rounded">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<div>
<!-- My Bids Section -->
<h2 class="text-2xl text-white font-bold mb-4">My Bids</h2>
<div class="grid grid-cols-3 gap-6 mt-4">
    @foreach($bids as $bid)
        <div class="mb-6 p-4 bg-gray-800 shadow-lg rounded-lg">
            <img src="{{ asset('storage/' . $bid->car->image) }}" alt="Car Image" class="w-full h-40 object-cover rounded-2xl mb-3">
            <h3 class="text-xl text-white font-semibold">{{ $bid->car->make }} {{ $bid->car->model }}</h3>
            <p class="text-white">Bid Amount: ${{ number_format($bid->amount, 2) }}</p>
            <p class="text-white">Status: 
                <span class="font-semibold {{ $bid->status == 'approved' ? 'text-green-600' : 'text-gray-500' }}">
                    {{ ucfirst($bid->status) }}
                </span>
            </p>

            <!-- Show the 'Download Receipt'-->
            @if($bid->status == 'approved')
                <a href="{{ route('bidding.receipt', $bid->id) }}" 
                   class="bg-[#6c35de] text-white px-4 py-2 rounded mt-2 block text-center">
                   Download Receipt
                </a>
            @endif
        </div>
    @endforeach
</div>

    <!-- Available Cars for Bidding Section -->
    <h2 class="text-2xl text-white font-bold mt-8 mb-4">Available Cars for Bidding</h2>
    <div class="grid grid-cols-3 gap-6 mt-4">
    @foreach($availableCars->where('is_active', true) as $car)
            <div class="mb-6 p-4 bg-gray-800 shadow-lg rounded-lg">
                <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="w-full h-40 object-cover rounded-2xl mb-3">
                <h3 class="text-xl text-white font-semibold">{{ $car->make }} {{ $car->model }}</h3>
                <p class="text-white">Year: {{ $car->year }}</p>
                <p class="text-white">Mileage: {{ number_format($car->mileage) }} km</p>
                <p class="text-white">Price: ${{ number_format($car->price, 2) }}</p>

                <!-- Bidding Form -->
                <form action="{{ route('bidding.submit', $car->id) }}" method="POST" class="mt-3">
                    @csrf
                    <label for="bid_amount" class="block font-medium text-white">Enter Your Bid Amount</label>
                    <input type="number" name="bid_amount" min="1" required class="mt-2 p-2 border rounded w-full" placeholder="Enter bid amount">
                    <button type="submit" class="bg-[#6c35de] text-white py-2 px-4 rounded mt-4 w-full">Place Bid</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
