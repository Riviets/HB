@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Забронювати кімнату</h1>
    <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm">
        @csrf

        <div class="form-group">
            <label for="hotel_id">Оберіть готель:</label>
            <select id="hotel_id" name="hotel_id" class="form-control" required>
                <option value="">-- Виберіть готель --</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="room_id">Оберіть кімнату:</label>
            <select id="room_id" name="room_id" class="form-control" required disabled>
                <option value="">-- Спочатку виберіть готель --</option>
            </select>
        </div>

        <div class="form-group">
            <label for="check_in_date">Дата заїзду:</label>
            <input type="date" id="check_in_date" name="check_in_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="duration_nights">Кількість ночей:</label>
            <input type="number" id="duration_nights" name="duration_nights" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Забронювати</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Назад</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#hotel_id').change(function() {
            var hotelId = $(this).val();

            if (hotelId) {
                $.ajax({
                    url: '/get-rooms/' + hotelId,
                    type: 'GET',
                    success: function(data) {
                        $('#room_id').empty();
                        $('#room_id').append('<option value="">-- Виберіть кімнату --</option>');
                        $.each(data, function(key, room) {
                            $('#room_id').append('<option value="' + room.id + '">' + room.room_number + '</option>');
                        });
                        $('#room_id').prop('disabled', false);
                    }
                });
            } else {
                $('#room_id').empty().append('<option value="">-- Спочатку виберіть готель --</option>').prop('disabled', true);
            }
        });
    });
</script>
@endsection
