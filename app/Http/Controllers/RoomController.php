<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Show the edit form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openEdit(Request $request)
    {
        $room = Room::where('id', '=', $request->route('id'))->first();
        return view('rooms.edit',  ['room' => $room]);
    }

    /**
     * Update room in database
     */
    public function updateRoom(Request $request): RedirectResponse
    {
        $room = Room::where('id', '=', $request->route('id'))->first();

        $request->validate([
            'name' => 'nullable|string',
            'price' => 'nullable|numeric',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
        ]);

        $room->fill($request->all());
        $room->save();

        return redirect()->intended(route('room.edit', ['id' => $room->id]))->with('status', 'Room updated');
    }
}
