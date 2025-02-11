<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestDrive;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class TestDriveController extends Controller
{
    public function index() {
        $testdrives = TestDrive::where('user_id', Auth::id())->get();
        $availableCars = Car::where('is_active', true)->get(); // Add this to get available cars
        
        // Make sure both variables are passed to the view
        return view('testdrives.index', compact('testdrives', 'availableCars'));
    }
    
    public function book(Request $request, $carId) {
        TestDrive::create([
            'user_id' => Auth::id(),
            'car_id' => $carId,
            'date' => $request->date,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Test drive booked successfully!');
    }

    public function approve($id) {
        $testDrive = TestDrive::findOrFail($id);
        $testDrive->status = 'approved';
        $testDrive->save();
        return back()->with('success', 'Test drive approved!');
    }
}
