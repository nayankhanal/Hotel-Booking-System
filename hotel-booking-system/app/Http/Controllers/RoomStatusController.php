<?php

namespace App\Http\Controllers;

use App\Models\RoomStatus;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomStatus $roomStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomStatus $roomStatus)
    {
        //
    }

    public function room_status($room_status) {
        $room = RoomStatus::where('id',$room_status)->first();
        $status = $room->status;
        return response()->json($status);
        // return response()->json($room);
        // return response()->json(['data'=>'namaste']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomStatus $roomStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomStatus $roomStatus)
    {
        //
    }
}
