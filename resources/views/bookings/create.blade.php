<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Забронювати кімнату</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Забронювати кімнату {{ $room->room_number }}</h1>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <div class="form-group">
                <label for="check_in_date">Дата заїзду:</label>
                <input type="date" id="check_in_date" name="check_in_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="duration_nights">Кількість ночей:</label>
                <input type="number" id="duration_nights" name="duration_nights" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Забронювати</button>
            <a href="{{ route('hotels.show', $room->hotel_id) }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
</body>
</html>
