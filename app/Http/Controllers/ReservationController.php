<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Show the reservation form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('reservations.create');
    }

    /**
     * Store reservation in database
     */
    public function createReservartions(Request $request)
    {
        
    }
}
