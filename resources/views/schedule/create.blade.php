<!DOCTYPE html>
<html>
<head>
    <title>Plan Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Plan Schedule</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('schedule.store') }}">
        @csrf
        <div class="form-group">
            <label for="week_id">Select Week:</label>
            <select name="week_id" id="week_id" class="form-control" required>
                <option value="" disabled selected>Select a week</option>
                @foreach($weeks as $week)
                    <option value="{{ $week->id }}">{{ $week->week_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="team_id">Select Team:</label>
            <select name="team_id" id="team_id" class="form-control" required>
                <option value="" disabled selected>Select a team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="employee_id">Select Employee:</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                <option value="" disabled selected>Select an employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="hours">Hours:</label>
            <input type="number" name="hours" id="hours" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Plan</button>
    </form>
</div>
</body>
</html>
