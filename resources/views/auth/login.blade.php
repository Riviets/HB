@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Увійти</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Електронна адреса</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Увійти</button>
    </form>
    <p class="mt-3">Ще не зареєстровані? <a href="{{ route('register') }}">Створити аккаунт</a></p>
</div>
@endsection
