<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Notifications\ReservationFeedback;
use Carbon\Carbon;
use Exception;

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
    public function createReservartions(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|string',
            'name_surname' => 'required|string',
            'arrival_date' => 'required|date|after:today',
            'departure_date' => 'required|date|after:arrival_date',
            'room_id' => 'required|exists:rooms,id',
            'notes' => 'nullable|string',
        ]);

        try {
            $reservation = Reservation::create($request->all());
        } catch (Exception $ex) {
            Log::error('Trouble making reservation: '.$ex->getMessage());
            return back()->with(['status' => 'Trouble making reservation']);
        }
        
        try {
            $reservation->notify(new ReservationFeedback($reservation->email, $reservation));
        } catch (Exception $ex) {
            Log::error('Trouble sending confirmation email: '.$ex->getMessage());
            return back()->with(['status' => 'Trouble sending confirmation email.']);
        }

        return back()->with(['status' => 'Successfully made reservation for room '.$reservation->room->name.'.']);
    }
}
