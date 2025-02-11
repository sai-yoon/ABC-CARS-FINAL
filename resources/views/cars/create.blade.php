@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-[#4d425f] p-6 rounded shadow">
    <h2 class="text-2xl text-[#ffffff] font-bold mb-4">Post a Car for Sale</h2>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="block mb-2 text-white">Make:</label>
<input type="text" name="make" class="border p-2 w-full mb-3 bg-gray-200 text-gray-700" placeholder="Enter the vehicle make" required>

<label class="block mb-2 text-white">Model:</label>
<input type="text" name="model" class="border p-2 w-full mb-3 bg-gray-200 text-gray-700" placeholder="Enter the vehicle model" required>

<label class="block mb-2 text-white">Year:</label>
<input type="number" name="year" class="border p-2 w-full mb-3 bg-gray-200 text-gray-700" placeholder="Enter the year of the vehicle" required>

<label class="block mb-2 text-white">Mileage (km):</label>
<input type="number" name="mileage" class="border p-2 w-full mb-3 bg-gray-200 text-gray-700" placeholder="Enter the mileage vehicle in km" required>

<label class="block mb-2 text-white">Price:</label>
<input type="number" name="price" class="border p-2 w-full mb-3 bg-gray-200 text-gray-700" placeholder="Input the price amount" required>

<label class="block mb-2 text-white">Description:</label>
<textarea name="description" class="border p-2 w-full mb-3 bg-gray-200 text-gray-700" placeholder="Enter a short description" required ></textarea>

<label class="block mb-2 text-white">Upload Image:</label>
<input type="file" name="image" class="border p-2 w-full mb-3 bg-gray-200 text-gray-700">
        
        <div class="mb-4">
            <label for="is_for_bidding" class="block font-medium text-white">Available for Bidding</label>
            <input type="checkbox" name="is_for_bidding" id="is_for_bidding" value="1" 
           {{ old('is_for_bidding') ? 'checked' : '' }}>
        </div>


        <button type="submit" class="bg-[#6c35de] text-white px-6 py-2 rounded">Post Car</button>
    </form>
</div>
@endsection
