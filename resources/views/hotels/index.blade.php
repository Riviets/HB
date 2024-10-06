<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список готелів</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Список готелів</h1>
        <a href="{{ route('hotels.create') }}" class="btn btn-primary mb-3">Додати новий готель</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Назва</th>
                    <th>Опис</th>
                    <th>Місцезнаходження</th>
                    <th>Рейтинг</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->id }}</td>
                        <td><a href="{{ route('hotels.show', $hotel->id) }}">{{ $hotel->name }}</a></td>
                        <td>{{ $hotel->description }}</td>
                        <td>{{ $hotel->location }}</td>
                        <td>{{ $hotel->rating }}</td>
                        <td>
                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Ви впевнені, що хочете видалити цей готель?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                            </form>
                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-info btn-sm">Редагувати</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
