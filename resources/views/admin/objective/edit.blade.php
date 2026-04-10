@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Objective</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('objective.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="description" class="form-label">Objective Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" required>{{ $data->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Objective Image (Optional)</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if($data->image)
                            <div class="mt-2 d-flex align-items-center">
                                <span>Current Image: </span>
                                <img src="{{ asset('images/objectives/' . $data->image) }}" alt="Objective Image" class="ms-2" style="width: 50px; height: 50px; object-fit: cover;">
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ $data->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Active (Show on website)
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-4 text-end">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection