@extends('layouts.app')

@section('title', 'Список готелів')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Список готелів</h1>
        <div>
            @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Вийти</button>
                </form>
                <a href="{{ route('users.show', auth()->user()->id) }}" class="btn btn-info mb-3">Профіль</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-secondary">Увійти</a>
                <a href="{{ route('register') }}" class="btn btn-success">Реєстрація</a>
            @endif
        </div>
    </div>

    <a href="{{ route('hotels.create') }}" class="btn btn-primary mb-3">Додати новий готель</a>
    <a href="{{ route('bookings.index') }}" class="btn btn-secondary mb-3">Переглянути бронювання</a>

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
@endsection
