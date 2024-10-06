<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->name }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $hotel->name }}</h1>
        <p><strong>Опис:</strong> {{ $hotel->description }}</p>
        <p><strong>Місцезнаходження:</strong> {{ $hotel->location }}</p>
        <p><strong>Рейтинг:</strong> {{ $hotel->rating }}</p>

        <h2>Кімнати</h2>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Додати кімнату</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Номер кімнати</th>
                    <th>Ємність</th>
                    <th>Ціна за ніч</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotel->rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>{{ $room->price_per_night }}</td>
                        <td>
                            <a href="{{ route('bookings.create', $room->id) }}" class="btn btn-success">Забронювати</a>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-info btn-sm">Редагувати</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Ви впевнені, що хочете видалити цю кімнату?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <a href="{{ route('hotels.index') }}" class="btn btn-secondary mt-3">Назад до списку готелів</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
