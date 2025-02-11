<!-- Car Details Page -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold text-gray-800">{{ $car->make }} {{ $car->model }}</h2>

        <!-- Car Image -->
        @if($car->image)
            <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="mt-4 w-full h-[500px] object-cover rounded-lg shadow">
        @else
            <p class="text-gray-500">No image available</p>
        @endif

        <!-- Car Description -->
        <p class="mt-4 text-gray-700">{{ $car->description ?? 'No description available' }}</p>

        <!-- Car Details -->
        <ul class="mt-4">
            <li><strong>Price:</strong> ${{ number_format($car->price, 2) }}</li>
            <li><strong>Year:</strong> {{ $car->year }}</li>
            <li><strong>Mileage:</strong> {{ $car->mileage }} km</li>
        </ul>

        <!-- Back Button -->
        <a href="{{ route('cars.index') }}" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Back to Listings
        </a>
    </div>
</div>
@endsection
