<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectController extends Controller
{
    // add
    public function add()
    {
        return view('admin.ongoing_project.add');
    }

    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'location' => 'nullable|string',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(1000000, 9999999).'project.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
        }

        // Normalize location: trim each comma-separated part and rejoin
        $location = null;
        if ($request->filled('location')) {
            $rawParts = array_filter(array_map('trim', explode(',', $request->location)));
            $cleanParts = [];
            foreach ($rawParts as $p) {
                if ($p === '') continue;

                // Extract name before words like 'Upazila', 'Upazilla' or Bangla 'উপজেলা'
                if (preg_match('/^(.*?)\s*(?:Upazila|Upazilla|উপজেলা)\b/i', $p, $m)) {
                    $name = trim($m[1]);
                } elseif (preg_match('/^(.*?)\s*of\s+.*$/i', $p, $m)) {
                    // formats like 'Jagannathpur Upazila of Sunamganj' => take 'Jagannathpur'
                    $name = trim($m[1]);
                } else {
                    $name = trim($p);
                }

                // Normalize spacing
                $name = preg_replace('/\s+/', ' ', $name);
                if ($name !== '') $cleanParts[] = $name;
            }

            $location = $cleanParts ? implode(', ', $cleanParts) : null;
        }

        $project = [
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'objective' => $request->objective,
            'location' => $location,
            'duration' => $request->duration,
            'donors' => $request->donors,
            'remark' => $request->remark,
            'image' => $imageName,
        ];

        DB::table('ongoing_project')->insert($project);

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $project = DB::table('ongoing_project')->orderBy('priority', 'desc')->get();

        return view('admin.ongoing_project.index', compact('project'));
    }

    // Destroy
    public function destroy($id)
    {
        $project = DB::table('ongoing_project')->where('id', $id)->first();
        $oldImageName = public_path('images/project/'.$project->image);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }

        DB::table('ongoing_project')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted Project');
    }

    // Edit
    public function edit($id)
    {
        $project = DB::table('ongoing_project')->where('id', $id)->first();

        return view('admin.ongoing_project.edit', compact('project'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'nullable|string',
        ]);

        $project = DB::table('ongoing_project')->where('id', $id)->first();

        $imageName = '';
        $oldImageName = public_path('images/project/'.$project->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldImageName)) {
                @unlink($oldImageName);
            }
            $imageName = rand(10000, 99999).'project.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
        } else {
            $imageName = $project->image;
        }

        // Normalize location input
        $location = $project->location ?? null; // default to old value
        if ($request->filled('location')) {
            $rawParts = array_filter(array_map('trim', explode(',', $request->location)));
            $cleanParts = [];
            foreach ($rawParts as $p) {
                if ($p === '') continue;
                if (preg_match('/^(.*?)\s*(?:Upazila|Upazilla|উপজেলা)\b/i', $p, $m)) {
                    $name = trim($m[1]);
                } elseif (preg_match('/^(.*?)\s*of\s+.*$/i', $p, $m)) {
                    $name = trim($m[1]);
                } else {
                    $name = trim($p);
                }
                $name = preg_replace('/\s+/', ' ', $name);
                if ($name !== '') $cleanParts[] = $name;
            }
            $location = $cleanParts ? implode(', ', $cleanParts) : null;
        }

        $project = [
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'objective' => $request->objective,
            'location' => $location,
            'duration' => $request->duration,
            'donors' => $request->donors,
            'remark' => $request->remark,
            'image' => $imageName,
        ];

        DB::table('ongoing_project')->where('id', $id)->update($project);

        return redirect()->back()->with('update', 'Successfully Updated data');
    }
}
