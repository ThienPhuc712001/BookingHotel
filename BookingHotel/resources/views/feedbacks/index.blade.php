@extends('layouts.app')

@section('content')
    <h1>Customer Feedbacks</h1>
    <a href="{{ route('feedbacks.create') }}">Add New Feedback</a>
    <ul>
        @foreach($feedbacks as $feedback)
            <li>
                {{ $feedback->comment }} - {{ $feedback->rating }} stars
                <a href="{{ route('feedbacks.show', $feedback) }}">View</a>
                <a href="{{ route('feedbacks.edit', $feedback) }}">Edit</a>
                <form action="{{ route('feedbacks.destroy', $feedback) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
