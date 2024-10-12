@extends('layouts.app')

@section('title', 'Редагувати готель')

@section('content')
    <h1>Редагувати готель</h1>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Назва:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $hotel->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Опис:</label>
            <textarea id="description" name="description" class="form-control" required>{{ $hotel->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Місцезнаходження:</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ $hotel->location }}" required>
        </div>

        <div class="form-group">
            <label for="rating">Рейтинг:</label>
            <input type="number" id="rating" name="rating" class="form-control" value="{{ $hotel->rating }}" min="0" max="5" required>
        </div>

        <button type="submit" class="btn btn-primary">Оновити готель</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Переглянути всі готелі</a>
    </form>
@endsection
