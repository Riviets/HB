<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $hotels = Hotel::all();
        return view('bookings.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'duration_nights' => 'required|integer|min:1',
        ]);

        $booking = new Booking();
        $booking->user_id = 1;
        $booking->room_id = $request->room_id;
        $booking->check_in_date = $request->check_in_date;
        $booking->duration_nights = $request->duration_nights;
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Бронювання успішно створено!');
    }

    public function index()
    {
        $bookings = Booking::with('room')->get();
        $rooms = Room::all();
        return view('bookings.index', compact('bookings', 'rooms'));
    }


    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'exists:rooms,id',
            'check_in_date' => 'date',
            'duration_nights' => 'integer|min:1',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return redirect()->route('bookings.index')->with('success', 'Бронювання успішно оновлено!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Бронювання успішно видалено!');
    }

    public function getRooms($hotelId)
    {
        $rooms = Room::where('hotel_id', $hotelId)->get();
        return response()->json($rooms);
    }

}
