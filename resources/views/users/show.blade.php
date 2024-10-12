@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Профіль користувача</h1>
        
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Ім'я:</strong> {{ $user->name }}</p>
        <p><strong>Електронна пошта:</strong> {{ $user->email }}</p>
        
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Назад до готелів</a>
    </div>
@endsection
