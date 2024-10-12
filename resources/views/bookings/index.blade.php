@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Список бронювань</h1>

    <h2>Додати нове бронювання</h2>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-4">Додати бронювання</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Кімната</th>
                <th>Дата заїзду</th>
                <th>Кількість ночей</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->room->room_number }}</td>
                    <td>{{ $booking->check_in_date }}</td>
                    <td>{{ $booking->duration_nights }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-info btn-sm">Редагувати</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Ви впевнені, що хочете видалити це бронювання?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
