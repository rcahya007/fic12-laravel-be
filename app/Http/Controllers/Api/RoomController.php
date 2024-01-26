<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json([
            'message' => 'Success',
            'data' => $rooms,
        ]);
    }

    public function create()
    {
        return view('pages.room.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|max:2048|nullable',
            'description' => 'nullable',
        ]);

        try {
            $data = $request->all();
            if ($request->image != null) {
                $filename = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/rooms', $filename);
                $data['image'] = $filename;
            }
            Room::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Room created successfully',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something goes wrong while uploading file!');
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('pages.room.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->name = $request->input('name');
        $room->description = $request->input('description');
        if ($request->image == null) {
            $room->fill($request->except('image'));
        } else {
            if ($room->image != null) {
                Storage::delete('public/rooms/' . $room->image);
            }
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/rooms', $filename);
            $room->image = $filename;
        }
        $room->save();
        return redirect()->route('room.index')->with('success', 'Room updated successfully');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        if ($room->image != null) {
            Storage::delete('public/rooms/' . $room->image);
        }
        $room->delete();
        return redirect()->route('room.index');
    }
}
