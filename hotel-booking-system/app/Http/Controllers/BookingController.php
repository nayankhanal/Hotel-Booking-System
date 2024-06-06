<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Floor;
use App\Models\RoomClass;
use App\Models\Addon;
use App\Models\PaymentStatus;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->cannot('create', Booking::class)){
            abort(403);
        }
        $floors = Floor::all();
        $classes = RoomClass::all();
        $addons = Addon::all();
        $payment_statuses = PaymentStatus::all();
        return view('components.bookings.create',compact('floors','classes','addons','payment_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(['msg'=>'Woooooo, yesss hurray']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
