@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Mission & Vision</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('mission.vision.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="background_image" class="form-label">Background Image (Home Mission/Vision)</label>
                            <input type="file" name="background_image" class="form-control @error('background_image') is-invalid @enderror" id="background_image">
                            <span class="text-info">Optional. Recommended size: 1920x600 (or similar wide banner).</span>
                            @error('background_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            @if(!empty($mission->background_image))
                                <div class="mt-2">
                                    <div class="fw-bold">Current Background:</div>
                                    <img src="{{ asset('images/mission_vision/'.$mission->background_image) }}" alt="Background" style="max-width: 100%; height: 140px; object-fit: cover; border-radius: 6px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="remove_background_image" name="remove_background_image">
                                        <label class="form-check-label" for="remove_background_image">
                                            Remove current background image
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="vision" class="form-label">Vision</label>
                            <textarea id="vision" name="vision" class="form-control @error('vision') is-invalid @enderror" rows="3">{{ old('vision', $mission->vision ?? '') }}</textarea>
                            @error('vision')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="mission" class="form-label">Mission</label>
                            <textarea id="mission" name="mission" class="form-control @error('mission') is-invalid @enderror" rows="3">{{ old('mission', $mission->mission ?? '') }}</textarea>
                            @error('mission')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Vision:</h6>
                        <p class="text-justify">
                            {{ isset($mission->vision)? $mission->vision:'' }}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <h6>Mission:</h6>
                        <p class="text-justify">
                            {{ isset($mission->mission)? $mission->mission:'' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
