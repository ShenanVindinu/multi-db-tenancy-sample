<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PlaceController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'places' => Place::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
        ]);

        Place::create($validated);

        return redirect(route('dashboard'));
    }

    public function destroy(Place $place): RedirectResponse
    {
        $place->delete();

        return redirect(route('dashboard'));
    }
}
