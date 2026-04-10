@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Objectives List</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">All Objectives</h5>
                    <a href="{{ route('objective.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Objective</a>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Icon</th>
                                <th style="width: 50%;">Description</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle text-primary" style="font-size: 1.5rem;"><i class="{{ $item->icon }}"></i></td>
                                <td class="align-middle">{{ $item->description }}</td>
                                <td class="align-middle">
                                    @if($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('objective.edit',$item->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('objective.delete',$item->id) }}" class="btn btn-sm btn-danger text-white text-center" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fadeIn animated bx bx-trash-alt"></i>
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
@endsection"@extends('layouts.admin')\n@section('content')\n<div class=\"row\">\n    <div class=\"col-xl-9 mx-auto\">\n        <h6 class=\"mb-0 text-uppercase\">Objectives</h6>\n        <hr/>\n        <div class=\"card\">\n            <div class=\"card-body\">\n                <div class=\"d-flex justify-content-end mb-3\">\n                    <a href=\"{{ route('objective.create') }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus\"></i> Add Objective</a>\n                </div>\n                @if (session()->has('success'))\n                    <div class=\"alert alert-success\">{{ session()->get('success') }}</div>\n                @endif\n                <div class=\"p-4 border rounded table-responsive\">\n                    <table class=\"table table-hover table-striped\">\n                        <thead>\n                            <tr>\n                                <th>SL.</th>\n                                <th>Icon</th>\n                                <th>Description</th>\n                                <th>Status</th>\n                                <th class=\"text-center\">Action</th>\n                            </tr>\n                        </thead>\n                        <tbody>\n                            @foreach (\$data as \$key=>\$item)\n                            <tr>\n                                <td class=\"align-middle\">{{ ++\$key }}</td>\n                                <td class=\"align-middle text-primary\" style=\"font-size: 1.5rem;\"><i class=\"{{ \$item- }}\"></i></td>\n                                <td class=\"align-middle\">{{ \Illuminate\Support\Str::limit(\$item->description, 60) }}</td>\n                                <td class=\"align-middle\">\n                                    @if(\$item->status == 1)\n                                        <span class=\"badge bg-success\">Active</span>\n                                    @else\n                                        <span class=\"badge bg-danger\">Inactive</span>\n                                    @endif\n                                </td>\n                                <td class=\"text-center align-middle\">\n                                    <a href=\"{{ route('objective.edit',\$item- }}\" class=\"btn btn-sm btn-primary text-white text-center\">\n                                        <i class=\"fadeIn animated bx bx-edit\"></i>\n                                    </a>\n                                    <a href=\"{{ route('objective.delete',\$item- }}\" class=\"btn btn-sm btn-danger text-white text-center\" onclick=\"return confirm('Are you sure you want to delete this item?');\">\n                                        <i class=\"fadeIn animated bx bx-trash-alt\"></i>\n                                    </a>\n                                </td>\n                            </tr>\n                            @endforeach\n                        </tbody>\n                    </table>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n@endsection" 
