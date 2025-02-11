@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-2xl text-white font-bold mb-4">My Car Listings</h2>
    <a href="{{ route('cars.create') }}" class="bg-[#6c35de] text-white px-4 py-2 rounded">Post New Car</a>
    
    <div class="grid grid-cols-3 gap-6 mt-4">
        @foreach($cars as $car)
            <div class="border rounded p-4 bg-white shadow">
                <h3 class="text-xl font-semibold">{{ $car->make }} {{ $car->model }}</h3>
                <p>Year: {{ $car->year }}</p>
                <p>Price: ${{ number_format($car->price, 2) }}</p>
                <a href="{{ route('cars.edit', $car->id) }}" class="text-blue-500">Edit</a> |
                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
