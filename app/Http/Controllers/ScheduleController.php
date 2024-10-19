<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Week;
use App\Models\Team;
use App\Models\Employee;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function create()
    {
        // Fetch weeks, teams, and employees to display in the dropdowns
        $weeks = Week::all();
        $teams = Team::all();
        $employees = Employee::all();

        return view('schedule.create', compact('weeks', 'teams', 'employees'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'week_id' => 'required|exists:weeks,id',
            'team_id' => 'required|exists:teams,id',
            'employee_id' => 'required|exists:employees,id',
            'hours' => 'required|integer|min:1',
        ]);

        // Store the schedule in the database
        Schedule::create($validated);

        return redirect()->back()->with('success', 'Schedule added successfully.');
    }
}
