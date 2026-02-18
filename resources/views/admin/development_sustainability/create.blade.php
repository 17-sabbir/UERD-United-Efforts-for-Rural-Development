@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Development & Sustainability Section</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('development_sustainability.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $data ? $data->title : 'Development & Sustainability' }}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="4" required>{{ $data ? $data->description : '' }}</textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
