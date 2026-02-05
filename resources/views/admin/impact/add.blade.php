@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Impact Metric</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('impact.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="e.g., People Served">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="metric_value" class="form-label">Metric Value</label>
                            <input type="text" name="metric_value" class="form-control @error('metric_value') is-invalid @enderror" id="metric_value" placeholder="e.g., 10000">
                            @error('metric_value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="metric_unit" class="form-label">Metric Unit</label>
                            <input type="text" name="metric_unit" class="form-control @error('metric_unit') is-invalid @enderror" id="metric_unit" placeholder="e.g., People, Projects, Villages">
                            @error('metric_unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="icon" class="form-label">Icon (Optional)</label>
                            <input type="text" name="icon" class="form-control" id="icon" placeholder="e.g., bx-user">
                        </div>
                        <div class="col-md-4">
                            <label for="year" class="form-label">Year (Optional)</label>
                            <input type="text" name="year" class="form-control" id="year" placeholder="e.g., 2024">
                        </div>
                        <div class="col-md-4">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="0">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
