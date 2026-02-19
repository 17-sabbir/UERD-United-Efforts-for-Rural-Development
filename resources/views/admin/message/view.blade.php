@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">View Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <div class="row mb-3">
                        <div class="col-1 text-end">
                            Name :
                        </div>
                        <div class="col-11">
                            {{ $message->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end">
                            Email :
                        </div>
                        <div class="col-11">
                            {{ $message->email }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end">
                            Received :
                        </div>
                        <div class="col-11">
                            {{ $message->created_at ? \Carbon\Carbon::parse($message->created_at)->format('d M Y, h:i A') : '' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end">
                            Subject :
                        </div>
                        <div class="col-10 fw-bold">
                            {{ $message->subject }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 text-end">
                            Message :
                        </div>
                        <div class="col-11">
                            <p>
                                {{ $message->message }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <h6 class="mb-3">Reply to User (will be sent to email)</h6>
                    @if(!empty($message->reply_message))
                        <div class="alert alert-info">
                            <div><strong>Last Reply Subject:</strong> {{ $message->reply_subject }}</div>
                            <div><strong>Last Replied At:</strong> {{ $message->replied_at ? \Carbon\Carbon::parse($message->replied_at)->format('d M Y, h:i A') : '' }}</div>
                            <div class="mt-2" style="white-space: pre-wrap;">{{ $message->reply_message }}</div>
                        </div>
                    @endif

                    <form action="{{ route('message.reply', $message->id) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="reply_subject" class="form-control @error('reply_subject') is-invalid @enderror" placeholder="Reply Subject" value="{{ old('reply_subject', 'Re: '.$message->subject) }}">
                            @error('reply_subject')
                                <div class="text-danger">{{ $errors->first('reply_subject') }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="reply_message" rows="5" class="form-control @error('reply_message') is-invalid @enderror" placeholder="Type your reply...">{{ old('reply_message') }}</textarea>
                            @error('reply_message')
                                <div class="text-danger">{{ $errors->first('reply_message') }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Send Reply</button>
                        <a href="{{ route('message.index') }}" class="btn btn-sm btn-primary">Back</a>
                    </form>
                    <div class="row">
                        <div class="offset-1 col-11">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
