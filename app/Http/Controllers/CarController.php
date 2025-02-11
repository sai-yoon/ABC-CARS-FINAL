<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::where('is_active', true) // Only active cars
        ->when($request->make, fn($query, $make) => $query->where('make', 'LIKE', "%{$make}%"))
        ->when($request->model, fn($query, $model) => $query->where('model', 'LIKE', "%{$model}%"))
        ->when($request->year, fn($query, $year) => $query->where('year', $year))
        ->when($request->min_price, fn($query, $min_price) => $query->where('price', '>=', $min_price))
        ->when($request->max_price, fn($query, $max_price) => $query->where('price', '<=', $max_price))
        ->get();
    
        // Pass the cars variable to the view
        return view('cars.index', compact('cars'));
    }
    


    public function create() {
        return view('cars.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer',
        'mileage' => 'required|integer',
        'price' => 'required|numeric',
        'image' => 'required|image',
        'is_for_bidding' => 'required|boolean'
    ]);

    $car = new Car($request->all());

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('cars', 'public');
        $car->image = $path;
    }
    
    $car->user_id = Auth::id();
    $car->save();

    return redirect()->route('cars.index')->with('success', 'Car added successfully.');
}
    public function show($id) {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
        
    }

    public function userListings() {
        $cars = Car::where('user_id', Auth::id())->get();
        return view('cars.user-listings', compact('cars'));
    }

    public function edit($id) {
        $car = Car::findOrFail($id);
    
        // Ensure only the owner can edit their listing
        if ($car->user_id !== Auth::id()) {
            return redirect()->route('cars.index')->with('error', 'Unauthorized action.');
        }
    
        return view('cars.edit', compact('car'));
    }
    
    public function update(Request $request, $id) {
        $car = Car::findOrFail($id);
        
        // Ensure only the owner can update their listing
        if ($car->user_id !== Auth::id()) {
            return redirect()->route('cars.index')->with('error', 'Unauthorized action.');
        }
    
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'mileage' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_for_bidding' => 'required|boolean'
            
        ]);
    
        // Update car details
        $car->update([
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'description' => $request->description,
        ]);
    
        // Handle image update if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
            $car->image = $imagePath;
            $car->save();
        }
    
        return redirect()->route('cars.userListings')->with('success', 'Car updated successfully!');
    }

    public function deactivate($id) {
        $car = Car::findOrFail($id);
        if ($car->user_id === Auth::id()) {
            $car->is_active = false;
            $car->save();
            return back()->with('success', 'Car listing deactivated.');
        }
        return back()->with('error', 'Unauthorized action.');
    }
    public function destroy($id) {
        $car = Car::findOrFail($id);
        if ($car->user_id === Auth::id()) {
            $car->delete();
            return redirect()->route('cars.userListings')->with('success', 'Car listing deleted.');
        }
        return back()->with('error', 'Unauthorized action.');
    }
    public function toggleStatus($id) {
        $car = Car::findOrFail($id);
    
        // Allow only admins to activate/deactivate
        if (Auth::user()->is_admin) {
            $car->is_active = !$car->is_active; // Toggle status
            $car->save();
            return back()->with('success', 'Car status updated.');
        }
    
        return back()->with('error', 'Unauthorized action.');
    }
}
