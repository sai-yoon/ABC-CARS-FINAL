@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Car Listing</h2>
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block mb-2">Make:</label>
        <input type="text" name="make" value="{{ $car->make }}" class="border p-2 w-full mb-3" required>

        <label class="block mb-2">Model:</label>
        <input type="text" name="model" value="{{ $car->model }}" class="border p-2 w-full mb-3" required>

        <label class="block mb-2">Year:</label>
        <input type="number" name="year" value="{{ $car->year }}" class="border p-2 w-full mb-3" required>

        <label class="block mb-2">Mileage (km):</label>
        <input type="number" name="mileage" value="{{ $car->mileage }}" class="border p-2 w-full mb-3" required>

        <label class="block mb-2">Price:</label>
        <input type="number" name="price" value="{{ $car->price }}" class="border p-2 w-full mb-3" required>

        <label class="block mb-2">Description:</label>
        <textarea name="description" class="border p-2 w-full mb-3" required>{{ $car->description }}</textarea>

        <label class="block mb-2">Upload New Image (Optional):</label>
        <input type="file" name="image" class="border p-2 w-full mb-3">
        
        <div class="mb-4">
            <label for="is_for_bidding" class="block font-medium text-gray-700">Available for Bidding</label>
            <input type="checkbox" name="is_for_bidding" id="is_for_bidding" value="1" 
           {{ old('is_for_bidding', $car->is_for_bidding) ? 'checked' : '' }}>
        </div>


        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Update Car</button>
    </form>
</div>
@endsection
