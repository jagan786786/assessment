<!DOCTYPE html>
<html>
<head>
    <title>Add Week</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Add Week</h1>

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

    <form method="POST" action="{{ route('weeks.store') }}">
        @csrf
        <div class="form-group">
            <label for="week_name">Week Name:</label>
            <input type="text" name="week_name" class="form-control" value="{{ old('week_name') }}" required>
        </div>

        <div class="form-group">
            <label for="from_date">From Date:</label>
            <input type="date" name="from_date" class="form-control" value="{{ old('from_date') }}" required>
        </div>

        <div class="form-group">
            <label for="to_date">To Date:</label>
            <input type="date" name="to_date" class="form-control" value="{{ old('to_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Week</button>
    </form>
</div>
</body>
</html>
