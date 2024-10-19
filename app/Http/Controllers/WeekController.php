<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Week;

class WeekController extends Controller
{
    public function create()
    {
        // Show the form to add a week
        return view('weeks.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'week_name' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        // Store the week in the database
        Week::create($validated);

        return redirect()->back()->with('success', 'Week added successfully.');
    }
}
