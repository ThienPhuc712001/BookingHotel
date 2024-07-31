@extends('layouts.app')

@section('content')
    <h1>Edit Feedback</h1>
    <form action="{{ route('feedbacks.update', $feedback) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Customer</label>
            <select name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $feedback->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->full_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Service (optional)</label>
            <select name="service_id">
                <option value="">None</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $feedback->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Comment</label>
            <textarea name="comment" required>{{ $feedback->comment }}</textarea>
        </div>
        <div>
            <label>Rating</label>
            <input type="number" name="rating" min="1" max="5" value="{{ $feedback->rating }}" required>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
