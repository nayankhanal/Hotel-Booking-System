<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

use App\Models\Floor;

class RoomController extends Controller
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
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }

    public function get_rooms($floor) {
        // dd("Hello");
        $floorRooms = Room::where('floor_id',$floor)->get();
        return response()->json($floorRooms);
        // return response()->json(['data'=>'namaste']);
    }

    public function get_rooms_from_room_id($room) {
        // dd("Hello");
        $rooms = Room::where('id',$room)->first();
        // return response()->json(['message'=>'hello']);
        return response()->json($rooms);
        // return response()->json(['data'=>'namaste']);
    }
}
