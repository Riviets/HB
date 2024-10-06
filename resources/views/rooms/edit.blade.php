<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати кімнату</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Редагувати кімнату</h1>
        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="hotel_id">Готель:</label>
                <select id="hotel_id" name="hotel_id" class="form-control" required>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ $hotel->id == $room->hotel_id ? 'selected' : '' }}>
                            {{ $hotel->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="room_number">Номер кімнати:</label>
                <input type="text" id="room_number" name="room_number" class="form-control" value="{{ $room->room_number }}" required>
            </div>

            <div class="form-group">
                <label for="capacity">Ємність:</label>
                <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $room->capacity }}" required>
            </div>

            <div class="form-group">
                <label for="price_per_night">Ціна за ніч:</label>
                <input type="number" step="0.01" id="price_per_night" name="price_per_night" class="form-control" value="{{ $room->price_per_night }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Оновити кімнату</button>
        </form>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary mt-3">Назад до списку готелів</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
