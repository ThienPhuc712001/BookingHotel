@extends('layouts.app')

@section('content')
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ $service->title }}" required>
        </div>
        <div>
            <label>Short Description</label>
            <input type="text" name="small_dec" value="{{ $service->small_dec }}">
        </div>
        <div>
            <label>Full Description</label>
            <textarea name="big_dec">{{ $service->big_dec }}</textarea>
        </div>
        <div>
            <label>Photo</label>
            <input type="file" name="photo">
            @if($service->photo)
                <img src="{{ Storage::url($service->photo) }}" alt="Service Photo" width="100">
            @endif
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
