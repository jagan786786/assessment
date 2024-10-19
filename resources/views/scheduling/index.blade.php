<!-- resources/views/scheduling/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Weekly Pre Scheduling</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Weekly Pre Scheduling</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('scheduling.store') }}">
        @csrf

        <div class="form-group">
            <label for="week_id">Select Week:</label>
            <select name="week_id" id="week_id" class="form-control" required>
                @foreach($weeks as $week)
                    <option value="{{ $week->id }}">{{ $week->week_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="team_id">Select Team:</label>
            <select name="team_id" id="team_id" class="form-control" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="employee_id">Select Employee:</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="hours">Hours:</label>
            <input type="number" name="hours" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Plan</button>
    </form>
</div>

</body>
</html>
