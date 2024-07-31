@extends('layouts.app')

@section('content')
    <h1>Add New Service</h1>
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Short Description</label>
            <input type="text" name="small_dec">
        </div>
        <div>
            <label>Full Description</label>
            <textarea name="big_dec"></textarea>
        </div>
        <div>
            <label>Photo</label>
            <input type="file" name="photo">
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
