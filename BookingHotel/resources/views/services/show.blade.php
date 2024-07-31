@extends('layouts.app')

@section('content')
    <h1>{{ $service->title }}</h1>
    <p>{{ $service->small_dec }}</p>
    <p>{{ $service->big_dec }}</p>
    @if($service->photo)
        <img src="{{ Storage::url($service->photo) }}" alt="Service Photo" width="100">
    @endif
    <a href="{{ route('services.index') }}">Back to Services</a>
@endsection
