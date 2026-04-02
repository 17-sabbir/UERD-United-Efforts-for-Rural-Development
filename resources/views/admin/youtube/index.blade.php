@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>YouTube Videos</h3>
        <a href="{{ route('youtube.add') }}" class="btn btn-primary mb-3">Add Video</a>
        @php
            function youtube_id_from_url($url){
                if(!$url) return null;
                // match common YouTube url formats
                if(preg_match('/(?:v=|\/)([a-zA-Z0-9_-]{6,})/', $url, $m)){
                    return $m[1];
                }
                return null;
            }
        @endphp

        <div class="row">
            @foreach($videos as $v)
                @php
                    $vid = youtube_id_from_url($v->youtube_link);
                    $thumb = $vid ? 'https://img.youtube.com/vi/'.$vid.'/mqdefault.jpg' : null;
                @endphp
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        @if($thumb)
                            <img src="{{ $thumb }}" class="card-img-top" alt="{{ $v->title }}">
                        @else
                            <div style="height:160px;background:#f1f1f1;display:flex;align-items:center;justify-content:center">No thumbnail</div>
                        @endif
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1" style="font-size:0.95rem">{{ $v->title }}</h6>
                            <p class="mb-1 small">Order: {{ $v->order ?? '-' }} • Active: {{ $v->is_active ? 'Yes' : 'No' }}</p>
                            <div class="d-flex">
                                <a href="{{ route('youtube.edit', $v->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <a href="{{ route('youtube.delete', $v->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
