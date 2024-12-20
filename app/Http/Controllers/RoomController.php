<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Show the edit form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openEdit()
    {
        return view('rooms.edit');
    }

    /**
     * Update room in database
     */
    public function editRoom(Request $request): RedirectResponse
    {
    }
}
