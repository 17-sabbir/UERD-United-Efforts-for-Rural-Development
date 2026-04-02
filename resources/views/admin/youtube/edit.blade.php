@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Edit YouTube Video</h3>
        <form action="{{ route('youtube.update', $video->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title (optional)</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">YouTube Link</label>
                <input type="text" name="youtube_link" class="form-control" required value="{{ old('youtube_link', $video->youtube_link) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Order</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $video->order) }}">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $video->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
