@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Ongoing Project</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="" placeholder="Enter Title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="priority" class="form-label">Priority (Higher number = Shows first on Home Page)</label>
                            <input type="number" name="priority" class="form-control" id="priority" value="0" placeholder="Enter Priority">
                        </div>
                        <div class="col-md-12">
                            <label for="location" class="form-label">Locations</label>
                            <input type="text" name="location" class="form-control" id="location" placeholder="Example: Derai Upazila, Sunamganj Sadar Upazila">
                                <small class="form-text text-muted">* Enter Upazila names separated by commas (example list for Sunamganj District): Derai , Jamalganj, Sunamganj Sadar, Tahirpur, Jagannathpur, Upazila of Sunamganj .</small>
                        </div>
                        <div class="col-md-12">
                            <label for="duration" class="form-label">Project Duration</label>
                            <input type="text" name="duration" class="form-control" id="duration" placeholder="Enter Duration (e.g. 2022 to Continue)">
                        </div>
                        <div class="col-md-12">
                            <label for="donors" class="form-label">Donors</label>
                            <input type="text" name="donors" class="form-control" id="donors" placeholder="Enter Donors">
                        </div>
                        <div class="col-md-12">
                            <label for="remark" class="form-label">Remark</label>
                            <input type="text" name="remark" class="form-control" id="remark" placeholder="Enter Remark">
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Image<span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="img">
                            <span class="text-info">Image Dimension Must be (725 X 375) and maximum size 300 kb.</span>
                            @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Objective of the Project<span class="text-danger">*</span></label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">

                            </textarea>
                            @error('description')
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
