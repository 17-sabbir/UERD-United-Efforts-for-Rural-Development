<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjectiveController extends Controller
{
    public function index()
    {
        $data = DB::table('objectives')->orderBy('order', 'asc')->get();
        return view('admin.objective.index', compact('data'));
    }

    public function create()
    {
        return view('admin.objective.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon ?? 'fa-solid fa-check',
            'order' => $request->order ?? 0,
            'status' => $request->status ? 1 : 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('objectives')->insert($data);
        return redirect()->route('objective.index')->with('success', 'Objective added successfully');
    }

    public function edit($id)
    {
        $data = DB::table('objectives')->where('id', $id)->first();
        return view('admin.objective.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon ?? 'fa-solid fa-check',
            'order' => $request->order ?? 0,
            'status' => $request->status ? 1 : 0,
            'updated_at' => now(),
        ];

        DB::table('objectives')->where('id', $id)->update($data);
        return redirect()->route('objective.index')->with('update', 'Objective updated successfully');
    }

    public function delete($id)
    {
        DB::table('objectives')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Objective deleted successfully');
    }
}
