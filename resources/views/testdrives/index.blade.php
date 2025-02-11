@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-2xl text-white font-bold mb-4">My Test Drive Appointments</h2>
    <div class="grid grid-cols-3 gap-6 mt-4">
        @foreach($testdrives as $testdrive)
            <div class="mb-6 p-4 bg-gray-800 shadow-lg rounded-lg">
                <h3 class="text-xl text-white font-semibold">{{ $testdrive->car->make }} {{ $testdrive->car->model }}</h3>
                
                <!-- Display car image for the test drive -->
                <img src="{{ asset('storage/'.$testdrive->car->image) }}" alt="{{ $testdrive->car->make }} {{ $testdrive->car->model }}" class="w-full h-48 object-cover rounded-xl mt-2 mb-4">

                <p class="text-white">Date: {{ $testdrive->date }}</p>
                <p class="text-white">Status: {{ ucfirst($testdrive->status) }}</p>
            </div>
        @endforeach
    </div>

    <h2 class="text-2xl text-white font-bold mt-8 mb-4">Available Cars for Test Drive</h2>
    <div class="grid grid-cols-3 gap-6 mt-4">
        @foreach($availableCars as $car)
            <div class="mb-6 p-4 bg-gray-800 shadow-lg rounded-lg">
                <h3 class="text-xl text-white font-semibold">{{ $car->make }} {{ $car->model }}</h3>
                <p class="text-white">Year: {{ $car->year }}</p>
                <p class="text-white">>Price: ${{ number_format($car->price, 2) }}</p>
                <p class="text-white">Mileage: {{ number_format($car->mileage) }} miles</p>

                <!-- Display car image with rounded corners -->
                <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->make }} {{ $car->model }}" class="w-full h-48 object-cover rounded-xl mt-2 mb-4">

                <!-- Add date picker input for booking a test drive -->
                <form action="{{ route('testdrive.book', $car->id) }}" method="POST">
                    @csrf
                    <label for="date" class="block font-medium text-white">Select Test Drive Date</label>
                    <input type="date" name="date" required class="mt-2 p-2 border rounded w-full">
                    <button type="submit" class="bg-[#6c35de] text-white py-2 px-4 rounded mt-4">Book Test Drive</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
