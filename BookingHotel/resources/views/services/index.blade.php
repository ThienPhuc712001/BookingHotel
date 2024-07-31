@extends('layouts.app')

@section('content')
    <h1>Services</h1>
    <a href="{{ route('services.create') }}">Add New Service</a>
    <ul>
        @foreach($services as $service)
            <li>
                <a href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
                <a href="{{ route('services.edit', $service) }}">Edit</a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
