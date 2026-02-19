<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectListController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('priority', 'desc')->orderBy('created_at', 'desc')->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required',
            'objectives' => 'nullable',
            'locations' => 'nullable',
            'start_year' => 'required|integer|min:1900|max:2100',
            'end_year' => 'nullable',
            'donors' => 'nullable',
            'total_beneficiary' => 'nullable',
            'status' => 'required|in:ongoing,completed',
            'priority' => 'nullable|integer|min:0',
            'remark' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
        ]);

        $payload = $validated;

        $endRaw = $request->input('end_year');
        $isContinuing = $payload['status'] === 'ongoing';
        $endYear = null;

        if ($payload['status'] === 'completed') {
            if ($endRaw !== null && $endRaw !== '' && is_numeric($endRaw)) {
                $endYear = (int) $endRaw;
            }
            if ($endYear === null) {
                $endYear = (int) now()->format('Y');
            }
            $isContinuing = false;
        }

        $payload['end_year'] = $endYear;
        $payload['is_continuing'] = $isContinuing;
        $payload['project_duration'] = project_period((object) array_merge($payload, ['status' => $payload['status']]));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand(1000000, 9999999) . 'project.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
            $payload['image'] = $imageName;
        }

        Project::create($payload);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function show(Project $project)
    {
        return redirect()->route('admin.projects.edit', $project);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_name' => 'required',
            'objectives' => 'nullable',
            'locations' => 'nullable',
            'start_year' => 'required|integer|min:1900|max:2100',
            'end_year' => 'nullable',
            'donors' => 'nullable',
            'total_beneficiary' => 'nullable',
            'status' => 'required|in:ongoing,completed',
            'priority' => 'nullable|integer|min:0',
            'remark' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
        ]);

        $payload = $validated;

        $endRaw = $request->input('end_year');
        $isContinuing = $payload['status'] === 'ongoing';
        $endYear = null;

        if ($payload['status'] === 'completed') {
            if ($endRaw !== null && $endRaw !== '' && is_numeric($endRaw)) {
                $endYear = (int) $endRaw;
            }
            if ($endYear === null) {
                $endYear = (int) now()->format('Y');
            }
            $isContinuing = false;
        }

        $payload['end_year'] = $endYear;
        $payload['is_continuing'] = $isContinuing;
        $payload['project_duration'] = project_period((object) array_merge($payload, ['status' => $payload['status']]));

        if ($request->hasFile('image')) {
            if (!empty($project->image)) {
                $oldImagePath = public_path('images/project/' . $project->image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = rand(1000000, 9999999) . 'project.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
            $payload['image'] = $imageName;
        }

        $project->update($payload);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function toggleStatus(Project $project)
    {
        $newStatus = $project->status === 'ongoing' ? 'completed' : 'ongoing';

        $startYear = $project->start_year;
        if (empty($startYear)) {
            $parsed = parse_project_duration_years($project->project_duration);
            $startYear = $parsed['start_year'] ?? null;
        }

        $updates = [
            'status' => $newStatus,
            'start_year' => $startYear,
        ];

        if ($newStatus === 'completed') {
            $updates['is_continuing'] = false;
            $updates['end_year'] = $project->end_year ?: (int) now()->format('Y');
        } else {
            $updates['is_continuing'] = true;
            $updates['end_year'] = null;
        }

        $updates['project_duration'] = project_period((object) array_merge($project->toArray(), $updates));

        $project->update($updates);

        return redirect()->back()->with('success', 'Project status updated successfully.');
    }

    public function destroy(Project $project)
    {
        if (!empty($project->image)) {
            $oldImagePath = public_path('images/project/' . $project->image);
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
