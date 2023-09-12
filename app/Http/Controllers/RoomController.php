<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Room::all();
       return view('admin.rooms.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = RoomType::all();
        return view('admin.rooms.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Room();
        $data->title = $request->title;
        $data->room_type_id = $request->rt_id;
        $data->save();

        return redirect('admin/rooms')->with('message', 'data has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Room::find($id);
        $roomtype= RoomType::all();
        return view('admin.rooms.show', compact('data', 'roomtype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomtype= RoomType::all();
        $data= Room::find($id);

        return view('admin.rooms.edit', compact('roomtype', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= Room::find($id);
        $data->title= $request->title;
        $data->room_type_id= $request->rt_id;

        $data->update();

       return redirect('admin/rooms')->with('message', 'data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::where('id', $id)->delete();
        return redirect('admin/rooms')->with('message', 'data has been deleted successfully');
    }
}
