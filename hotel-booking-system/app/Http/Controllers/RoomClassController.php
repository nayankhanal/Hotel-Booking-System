<?php

namespace App\Http\Controllers;

use App\Models\RoomClass;
use Illuminate\Http\Request;

use App\Models\Room;

class RoomClassController extends Controller
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
    public function show(RoomClass $roomClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomClass $roomClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomClass $roomClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomClass $roomClass)
    {
        //
    }

    public function room_class($class) {
        $classRooms = Room::where('room_class_id',$class)->get();
        // return response()->json(['data'=>'namaste']);
        return response()->json($classRooms);
    }

    public function room_class_for_price($class) {
        $classRoom = RoomClass::where('id',$class)->first();
        // return response()->json(['data'=>'namaste']);
        return response()->json($classRoom);
    }
}
