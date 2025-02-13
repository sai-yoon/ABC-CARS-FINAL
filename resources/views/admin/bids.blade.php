@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-2xl text-white font-bold mb-4">Manage Bids</h2>

    <table class="w-full bg-white shadow-md rounded border">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3">Bid ID</th>
            <th class="p-3">Car</th>
            <th class="p-3">Car Price</th> <!-- New Column -->
            <th class="p-3">Bidder</th>
            <th class="p-3">Amount</th>
            <th class="p-3">Status</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bids as $bid)
        <tr class="border-b">
            <td class="p-3">{{ $bid->id }}</td>
            <td class="p-3">{{ $bid->car->make }} {{ $bid->car->model }}</td>
            <td class="p-3">${{ number_format($bid->car->price, 2) }}</td> <!-- Display Car Price -->
            <td class="p-3">{{ $bid->user->name }}</td>
            <td class="p-3">${{ number_format($bid->amount, 2) }}</td>
            <td class="p-3">{{ ucfirst($bid->status) }}</td>
            <td class="p-3">
                <form action="{{ route('admin.bids.update', ['id' => $bid->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" class="border p-2">
                        <option value="pending" {{ $bid->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $bid->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="declined" {{ $bid->status == 'declined' ? 'selected' : '' }}>Declined</option>
                    </select>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
