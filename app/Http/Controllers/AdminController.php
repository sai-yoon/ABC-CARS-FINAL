<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Models\Car;
use App\Models\Bidding;
use App\Models\TestDrive;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all users who are NOT admins
    $users = User::where('role', '!=', 'admin')->get();

    return view('admin.dashboard', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function listUsers() {
        $users = User::all();
        return view('admin.makeAdmin', compact('users'));
    }
    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }
    public function markAsAdmin($id) {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();
        return redirect()->route('admin.users')->with('success', 'User promoted to Admin!');
    }

    public function manageCars() {
        $cars = Car::all();
        return view('admin.cars', compact('cars'));
    }

    public function toggleCarStatus(Request $request, $id) {
        $car = Car::findOrFail($id);
    
        // Debugging Step - Check before updating
        logger()->info('Before Update:', ['car' => $car]);
    
        $car->is_active = $request->is_active == "1" ? 1 : 0;
        $car->save();
    
        // Debugging Step - Check after updating
        logger()->info('After Update:', ['car' => $car]);
    
        return back()->with('success', 'Car status updated!');
    }
    
    
    

    public function deleteCar($id) {
        $car = Car::findOrFail($id);
        $car->delete();
        return back()->with('success', 'Car deleted successfully!');
    }

    public function testDrives() {
        $testDrives = TestDrive::all();
        return view('admin.testdrives', compact('testDrives')); // Pass the variable to the view
    }
    

    public function approveTestDrive($id) {
        $testDrive = TestDrive::findOrFail($id);
        $testDrive->status = 'approved';
        $testDrive->save();
        return back()->with('success', 'Test drive approved!');
    }

    public function updateTestDrive(Request $request, $id) {
        $testDrive = TestDrive::findOrFail($id);
        $testDrive->status = $request->status;
        $testDrive->save();
    
        return back()->with('success', 'Test drive status updated successfully!');
    }

    public function bids() {
        $bids = Bidding::all(); // Fetch all bids from the database
        return view('admin.bids', compact('bids'));
    }
    
    public function updateBid(Request $request, $id) {
        $bid = Bidding::findOrFail($id);
        $bid->status = $request->status;
        $bid->save();
    
        return back()->with('success', 'Bid status updated successfully!');
    }
    
    public function finalizeTransaction($id) {
        $bid = Bidding::findOrFail($id);
        $bid->status = 'sold';
        $bid->save();
        return back()->with('success', 'Transaction completed!');
    }


}
