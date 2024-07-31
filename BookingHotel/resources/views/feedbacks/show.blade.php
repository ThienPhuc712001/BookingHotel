@extends('layouts.app')

@section('content')
    <h1>Feedback Details</h1>
    <p>Customer: {{ $feedback->customer->full_name }}</p>
    <p>Service: {{ $feedback->service ? $feedback->service->title : 'None' }}</p>
    <p>Comment: {{ $feedback->comment }}</p>
    <p>Rating: {{ $feedback->rating }} stars</p>
    <a href="{{ route('feedbacks.index') }}">Back to Feedbacks</a>
@endsection
