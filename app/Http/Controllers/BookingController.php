<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);
        return view('bookings.create', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'duration_nights' => 'required|integer|min:1',
        ]);

        Booking::create([
            'user_id' => 1,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'duration_nights' => $request->duration_nights,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Бронювання успішно додано!');
    }

    public function index()
    {
        $bookings = Booking::with('room')->get();
        return view('bookings.index', compact('bookings'));
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
}
