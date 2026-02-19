@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @php($totalMessageCount = function_exists('total_messages_count') ? total_messages_count() : 0)
                @php($unreadMessageCount = function_exists('unread_messages_count') ? unread_messages_count() : 0)
                @php($repliedMessageCount = function_exists('replied_messages_count') ? replied_messages_count() : 0)
                @php($unrepliedMessageCount = function_exists('unreplied_messages_count') ? unreplied_messages_count() : 0)
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
                    <div>
                        <span class="badge bg-dark">Total: {{ $totalMessageCount }}</span>
                        <span class="badge bg-warning text-dark">Unread: {{ $unreadMessageCount }}</span>
                        <span class="badge bg-success">Replied: {{ $repliedMessageCount }}</span>
                        <span class="badge bg-light text-dark">Not Replied: {{ $unrepliedMessageCount }}</span>
                    </div>
                    <form action="{{ route('message.markAllRead') }}" method="POST" onsubmit="return confirm('Mark all messages as read?');">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-secondary">Mark all as read</button>
                    </form>
                </div>
                <div class="p-4 border rounded table-responsive" style="max-width: 100%; overflow-x: auto;">
                    <table class="table table-hover table-striped" style="min-width: 720px;">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Received</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $key=>$message)
                            <tr @if(isset($message->is_read) && ! $message->is_read) class="table-warning" @endif>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $message->name }}</td>
                                <td class="align-middle">{{ $message->email }}</td>
                                <td class="align-middle">{{ $message->subject }}</td>
                                <td class="align-middle">
                                    @if(isset($message->is_read) && $message->is_read)
                                        <span class="badge bg-secondary">Read</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Unread</span>
                                    @endif

                                    @if(!empty($message->replied_at))
                                        <span class="badge bg-success ms-1">Replied</span>
                                    @else
                                        <span class="badge bg-light text-dark ms-1">Not Replied</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if(property_exists($message, 'created_at') && $message->created_at)
                                        {{ \Carbon\Carbon::parse($message->created_at)->format('d M Y, h:i A') }}
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('message.delete',$message->id) }}" class="btn btn-sm btn-danger text-white text-center" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fadeIn animated bx bx-trash-alt"></i>
                                    </a>
                                    <a href="{{ route('message.view',$message->id) }}" class="btn btn-sm btn-info text-white text-center">
                                        <i class="lni lni-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
