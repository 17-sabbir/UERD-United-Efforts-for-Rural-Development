
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Project Archive</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('project.archive.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="project_name" class="form-label">Project Name<span class="text-danger">*</span></label>
                            <input type="text" name="project_name" class="form-control @error('project_name') is-invalid @enderror" id="project_name" value="{{ old('project_name') }}" placeholder="Enter Project Name">
                            @error('project_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="donors" class="form-label">Partner/Donor<span class="text-danger">*</span></label>
                            <input type="text" name="donors" class="form-control @error('donors') is-invalid @enderror" id="donors" value="{{ old('donors') }}" placeholder="Enter Partner/Donor Name">
                            @error('donors')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="project_duration" class="form-label">Duration</label>
                            <input type="text" name="project_duration" class="form-control @error('project_duration') is-invalid @enderror" id="project_duration" value="{{ old('project_duration') }}" placeholder="Enter Duration (e.g. 2023-2025)">
                            @error('project_duration')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
