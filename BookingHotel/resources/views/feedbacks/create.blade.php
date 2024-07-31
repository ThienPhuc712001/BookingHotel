@extends('layouts.app')

@section('content')
    <h1>Add New Feedback</h1>
    <form action="{{ route('feedbacks.store') }}" method="POST">
        @csrf
        <div>
            <label>Customer</label>
            <select name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Service (optional)</label>
            <select name="service_id">
                <option value="">None</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Comment</label>
            <textarea name="comment" required></textarea>
        </div>
        <div>
            <label>Rating</label>
            <input type="number" name="rating" min="1" max="5" required>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
