@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Impact Metric</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('impact.update',$data->id) }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $data->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="metric_value" class="form-label">Metric Value</label>
                            <input type="text" name="metric_value" class="form-control @error('metric_value') is-invalid @enderror" id="metric_value" value="{{ $data->metric_value }}">
                            @error('metric_value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="metric_unit" class="form-label">Metric Unit</label>
                            <input type="text" name="metric_unit" class="form-control @error('metric_unit') is-invalid @enderror" id="metric_unit" value="{{ $data->metric_unit }}">
                            @error('metric_unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{ $data->description }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="icon" class="form-label">Icon (Optional)</label>
                            <input type="text" name="icon" class="form-control" id="icon" value="{{ $data->icon }}">
                        </div>
                        <div class="col-md-4">
                            <label for="year" class="form-label">Year (Optional)</label>
                            <input type="text" name="year" class="form-control" id="year" value="{{ $data->year }}">
                        </div>
                        <div class="col-md-4">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="{{ $data->order }}">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
