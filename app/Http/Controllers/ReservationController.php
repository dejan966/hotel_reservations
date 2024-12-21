<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\ReservationConfirmation;
use App\Mail\ReservationCopy;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use App\Rules\ReCaptchaV3;
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
           'g-recaptcha-response' => ['required', new ReCaptchaV3('reservation')]
        ]);

        try {
            $reservation = Reservation::create($request->all());
        } catch (Exception $ex) {
            Log::error('Trouble making reservation: '.$ex->getMessage());
            return back()->with(['status' => 'Trouble making reservation']);
        }
        
        try {
            $date = Carbon::parse($reservation->arrival_date);
            $diff = $date->diffInDays($reservation->departure_date);
            
            $fullPrice = $reservation->room->price * $diff;
            Mail::to($reservation->email)->send(new ReservationConfirmation($reservation, $fullPrice));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ReservationCopy($reservation, $fullPrice));
        } catch (Exception $ex) {
            Log::error('Trouble sending confirmation email: '.$ex->getMessage());
            return back()->with(['status' => 'Trouble sending confirmation email.']);
        }

        return back()->with(['status' => 'Successfully made reservation for room '.$reservation->room->name.'.']);
    }
}
