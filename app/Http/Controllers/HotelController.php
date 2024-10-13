<?php

namespace App\Http\Controllers;

use App\Models\Hotel; 
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();

        if ($request->get('sort') === 'rating') {
            $query->orderBy('rating', 'desc');
        }

        $hotels = $query->get();
        return view('hotels.index', compact('hotels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $hotel = Hotel::create($request->all());
        return redirect()->route('hotels.index')->with('success', 'Готель успішно додано!');
    }

    public function show($id)
    {
        $hotel = Hotel::with('rooms')->findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'location' => 'string|max:255',
            'rating' => 'numeric|min:0|max:5',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

        return redirect()->route('hotels.index')->with('success', 'Готель успішно оновлено!');
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return response()->json(null, 204);
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function sortByRating()
    {
        $hotels = Hotel::orderBy('rating', 'desc')->get();
        return view('hotels.index', compact('hotels'));
    }

}
