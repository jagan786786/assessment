<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function create()
    {
        // Display the form to add a team
        return view('teams.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Store team data in the database
        Team::create($validated);

        return redirect()->back()->with('success', 'Team added successfully.');
    }
}
