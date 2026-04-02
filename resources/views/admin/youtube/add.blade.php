@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Add YouTube Video</h3>
        <form action="{{ route('youtube.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title (optional)</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">YouTube Link</label>
                <input type="text" name="youtube_link" class="form-control" required value="{{ old('youtube_link') }}" placeholder="https://www.youtube.com/watch?v=...">
            </div>
            <div class="mb-3">
                <label class="form-label">Order</label>
                <input type="number" name="order" class="form-control" value="{{ old('order',0) }}">
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
