<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Team;

class EmployeeController extends Controller
{
    public function create()
    {
        // Fetch all teams to display in the dropdown
        $teams = Team::all();
        return view('employees.create', compact('teams'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
        ]);

        // Store the employee in the database
        Employee::create($validated);

        return redirect()->back()->with('success', 'Employee added successfully.');
    }
}
