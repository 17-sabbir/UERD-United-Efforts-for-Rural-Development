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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'order' => 'nullable|integer',
        ]);

        $imageName = null;
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . "_objective." . $image->getClientOriginalExtension();
            $image->move(public_path('images/objectives'), $imageName);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'order' => 'nullable|integer',
        ]);

        $item = DB::table('objectives')->where('id', $id)->first();
        $imageName = $item->image;

        if ($image = $request->file('image')) {
            if ($imageName && is_file(public_path('images/objectives/' . $imageName))) {
                @unlink(public_path('images/objectives/' . $imageName));
            }
            $imageName = rand(10000, 99999) . "_objective." . $image->getClientOriginalExtension();
            $image->move(public_path('images/objectives'), $imageName);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'order' => $request->order ?? 0,
            'status' => $request->status ? 1 : 0,
            'updated_at' => now(),
        ];

        DB::table('objectives')->where('id', $id)->update($data);
        return redirect()->route('objective.index')->with('update', 'Objective updated successfully');
    }

    public function delete($id)
    {
        $item = DB::table('objectives')->where('id', $id)->first();
        if ($item && $item->image && is_file(public_path('images/objectives/' . $item->image))) {
            @unlink(public_path('images/objectives/' . $item->image));
        }

        DB::table('objectives')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Objective deleted successfully');
    }
}
