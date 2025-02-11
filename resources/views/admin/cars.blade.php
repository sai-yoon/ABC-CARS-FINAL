@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-3xl font-bold text-white">Manage Car Listings</h2>
    
    <table class="w-full bg-white shadow-md rounded border mt-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Owner</th>
                <th class="p-3">Car</th>
                <th class="p-3">Year</th>
                <th class="p-3">Price</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td class="p-3">{{ $car->id }}</td>
                    <td class="p-3">{{ $car->owner->name }}</td>
                    <td class="p-3">{{ $car->make }} {{ $car->model }}</td>
                    <td class="p-3">{{ $car->year }}</td>
                    <td class="p-3">${{ number_format($car->price, 2) }}</td>
                    <td class="p-3">
                        <span class="{{ $car->is_active ? 'text-green-500' : 'text-red-500' }}">
                            {{ $car->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="p-3">
                        <!-- Activate/Deactivate Button -->
                        <form action="{{ route('cars.toggleStatus', $car->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-yellow-500">
                                {{ $car->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="inline ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
