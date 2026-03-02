@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="mb-0 text-uppercase">Executive Committee Members</h6>
            <a href="{{ route('executive.add') }}" class="btn btn-sm btn-success">
                <i class="bx bx-plus"></i> Add Member
            </a>
        </div>
        <hr/>

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        @if (session()->has('update'))
            <div class="alert alert-success">{{ session()->get('update') }}</div>
        @endif

        {{-- Tree Preview --}}
        <div class="card mb-4">
            <div class="card-header bg-light">
                <strong><i class="bx bx-sitemap me-1"></i> Organisation Tree Preview</strong>
                <small class="text-muted ms-2">(as shown on the public committee page)</small>
            </div>
            <div class="card-body">
                @if(count($tree) === 0)
                    <p class="text-muted mb-0">No members yet. Add a root node to get started.</p>
                @else
                    @php
                        $renderAdminTree = null;
                        $renderAdminTree = function($nodes, $depth = 0) use (&$renderAdminTree) {
                            foreach ($nodes as $node) {
                                $indent = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $depth);
                                $connector = $depth > 0 ? '└─ ' : '';
                                echo '<div style="padding: 4px 0; font-size: 0.88rem;">';
                                echo $indent . $connector;
                                echo '<img src="' . asset('images/executive_committee/' . $node->photo) . '" width="28" height="28" class="rounded-circle me-1" style="object-fit:cover;">';
                                echo '<strong>' . e($node->name) . '</strong>';
                                echo ' <span class="text-muted">— ' . e($node->designation) . '</span>';
                                if ($node->parent_id) {
                                    echo ' <span class="badge bg-secondary ms-1" style="font-size:0.7rem;">child</span>';
                                } else {
                                    echo ' <span class="badge bg-success ms-1" style="font-size:0.7rem;">root</span>';
                                }
                                echo '</div>';
                                if (!empty($node->children)) {
                                    $renderAdminTree($node->children, $depth + 1);
                                }
                            }
                        };
                        $renderAdminTree($tree);
                    @endphp
                @endif
            </div>
        </div>

        {{-- Flat Table --}}
        <div class="card">
            <div class="card-header bg-light">
                <strong><i class="bx bx-list-ul me-1"></i> All Members (Flat List)</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Parent</th>
                                <th>Order</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset('images/executive_committee/'.$item->photo) }}" width="45" height="45" class="rounded-circle" style="object-fit:cover;">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->designation }}</td>
                                <td>
                                    @if($item->parent_id)
                                        @php $parent = $all->firstWhere('id', $item->parent_id); @endphp
                                        @if($parent)
                                            <span class="badge bg-secondary">{{ $parent->name }}</span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    @else
                                        <span class="badge bg-success">Root</span>
                                    @endif
                                </td>
                                <td>{{ $item->order }}</td>
                                <td class="text-center">
                                    <a href="{{ route('executive.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('executive.delete', $item->id) }}" class="btn btn-sm btn-danger"
                                       onclick="return confirm('Delete {{ addslashes($item->name) }}? Their children will be moved up one level.')">
                                        <i class="bx bx-trash-alt"></i>
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
