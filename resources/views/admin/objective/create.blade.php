@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add New Objective</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('objective.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="description" class="form-label">Objective Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" required></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="icon" class="form-label">Font Awesome Icon Class (Optional)</label>
                            <input type="text" name="icon" class="form-control" id="icon" placeholder="e.g. fa-solid fa-hand-fist">
                            <small class="text-muted">You can find icons at <a href="https://fontawesome.com/icons" target="_blank">FontAwesome</a></small>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" checked>
                                <label class="form-check-label" for="status">
                                    Active (Show on website)
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-4 text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection