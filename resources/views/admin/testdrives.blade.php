@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-4">Manage Test Drives</h2>

    <table class="w-full bg-white shadow-md rounded border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Car</th>
                <th class="p-3">User</th>
                <th class="p-3">Date</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testDrives as $testDrive)
    <tr class="border-b">
        <td class="p-3">{{ $testDrive->id }}</td>
        <td class="p-3">{{ $testDrive->car->make }} {{ $testDrive->car->model }}</td>
        <td class="p-3">{{ $testDrive->user->name }}</td>
        <td class="p-3">{{ $testDrive->date }}</td>
        <td class="p-3">{{ ucfirst($testDrive->status) }}</td>

                <td class="p-3">
                    <form action="{{ route('admin.testdrives.update', $testDrive->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="border p-2">
                            <option value="pending" {{ $testDrive->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $testDrive->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="denied" {{ $testDrive->status == 'denied' ? 'selected' : '' }}>Denied</option>
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
