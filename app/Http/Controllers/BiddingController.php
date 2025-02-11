<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Bidding;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class BiddingController extends Controller
{
    /**
     * Display the user's bids and available cars for bidding.
     */
    public function index()
    {
        $bids = Bidding::with('car')->where('user_id', Auth::id())->get(); // User's bids
    
        // Only fetch cars that are for bidding AND active
        $availableCars = Car::where('is_for_bidding', true)
                            ->where('is_active', true) // Exclude inactive cars
                            ->get();

        return view('biddings.index', compact('bids', 'availableCars'));
    }

    /**
     * Store a new bid.
     */
    public function store(Request $request, $carId)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:1',
        ]);

        $car = Car::findOrFail($carId);

        // Prevent users from bidding on their own cars
        if ($car->user_id === Auth::id()) {
            return back()->with('error', 'You cannot place a bid on your own car.');
        }

        Bidding::create([
            'user_id' => Auth::id(),
            'car_id' => $carId,
            'amount' => $request->bid_amount, // Changed from 'price' to 'amount'
            'status' => 'pending',
        ]);

        return back()->with('success', 'Bid placed successfully!');
    }

    /**
     * Approve a bid.
     */
    public function approve($id)
    {
        $bid = Bidding::findOrFail($id);
        $bid->status = 'approved';
        $bid->is_paid = true; // Mark as paid
        $bid->save();
    
        return back()->with('success', 'Bid approved and payment confirmed!');
    }
        public function downloadReceipt($id)
    {
        $bid = Bidding::with('car')->findOrFail($id);
    
        if ($bid->status !== 'approved') {
            return back()->with('error', 'Receipt is only available for approved bids.');
        }
    
        // Generate PDF
        $pdf = Pdf::loadView('biddings.receipt', compact('bid'));
    
        // Return the PDF for download
        return $pdf->download("receipt_{$bid->id}.pdf");
    }
}

