@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $hotel->name }}</h1>
        <p><strong>Опис:</strong> {{ $hotel->description }}</p>
        <p><strong>Місцезнаходження:</strong> {{ $hotel->location }}</p>
        <p><strong>Рейтинг:</strong> {{ $hotel->rating }}</p>

        <h2>Кімнати</h2>
        @if(Auth::check() && auth()->user()->isAdmin())
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Додати кімнату</a>
        @endif

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
                            @if(Auth::check() && auth()->user()->isAdmin())
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-info btn-sm">Редагувати</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Ви впевнені, що хочете видалити цю кімнату?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('hotels.index') }}" class="btn btn-secondary mt-3">Назад до списку готелів</a>
    </div>
@endsection
