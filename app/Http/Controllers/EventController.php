<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        // Fetch all events from the database
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
        ]);

        // Create a new event
        $event = Event::create($validatedData);

        return response()->json($event, 201);
    }
}
