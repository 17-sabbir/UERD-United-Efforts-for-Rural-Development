<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImpactController extends Controller
{
    // add
    public function add()
    {
        return view('admin.impact.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'metric_value' => 'required',
            'metric_unit' => 'required',
            'order' => 'nullable|integer',
        ]);

        $data = array(
            'title' => $request->title,
            'metric_value' => $request->metric_value,
            'metric_unit' => $request->metric_unit,
            'description' => $request->description,
            'icon' => $request->icon,
            'year' => $request->year,
            'order' => $request->order ?? 0
        );

        DB::table('impact')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('impact')->orderBy('order', 'asc')->get();
        return view('admin.impact.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        DB::table('impact')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('impact')->where('id', $id)->first();
        return view('admin.impact.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'metric_value' => 'required',
            'metric_unit' => 'required',
            'order' => 'nullable|integer',
        ]);

        $data = array(
            'title' => $request->title,
            'metric_value' => $request->metric_value,
            'metric_unit' => $request->metric_unit,
            'description' => $request->description,
            'icon' => $request->icon,
            'year' => $request->year,
            'order' => $request->order ?? 0
        );

        DB::table('impact')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }
}
