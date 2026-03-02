<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExecutiveCommitteeController extends Controller
{
    // ── Helper: build nested tree from flat collection ─────────────────
    private function buildTree($all, $parentId = null)
    {
        $nodes = [];
        foreach ($all as $item) {
            if ($item->parent_id == $parentId) {
                $item->children = $this->buildTree($all, $item->id);
                $nodes[] = $item;
            }
        }
        // sort by order
        usort($nodes, fn($a, $b) => ($a->order ?? 0) <=> ($b->order ?? 0));
        return $nodes;
    }

    // add
    public function add()
    {
        $allMembers = DB::table('executive_committee')->orderBy('order')->get();
        return view('admin.executive_committee.add', compact('allMembers'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'designation' => 'required',
            'photo'       => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
            'order'       => 'nullable|integer',
        ]);

        $photoName = '';
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . "executive." . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/executive_committee/'), $photoName);
        }

        DB::table('executive_committee')->insert([
            'parent_id'   => $request->parent_id ?: null,
            'name'        => $request->name,
            'designation' => $request->designation,
            'bio'         => $request->bio,
            'photo'       => $photoName,
            'facebook'    => $request->facebook,
            'twitter'     => $request->twitter,
            'instagram'   => $request->instagram,
            'youtube'     => $request->youtube,
            'order'       => $request->order ?? 0,
        ]);

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $all  = DB::table('executive_committee')->orderBy('order', 'asc')->get();
        $tree = $this->buildTree($all);
        return view('admin.executive_committee.index', compact('all', 'tree'));
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('executive_committee')->where('id', $id)->first();
        if ($item && $item->photo) {
            $path = public_path('images/executive_committee/' . $item->photo);
            if (file_exists($path)) @unlink($path);
        }
        // Re-parent children to the deleted node's parent
        DB::table('executive_committee')->where('parent_id', $id)
            ->update(['parent_id' => $item->parent_id ?? null]);
        DB::table('executive_committee')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully deleted');
    }

    // Edit
    public function edit($id)
    {
        $data       = DB::table('executive_committee')->where('id', $id)->first();
        $allMembers = DB::table('executive_committee')->where('id', '!=', $id)->orderBy('order')->get();
        return view('admin.executive_committee.edit', compact('data', 'allMembers'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'designation' => 'required',
            'order'       => 'nullable|integer',
        ]);

        $item      = DB::table('executive_committee')->where('id', $id)->first();
        $photoName = $item->photo;

        if ($photo = $request->file('photo')) {
            if ($photoName && file_exists(public_path('images/executive_committee/' . $photoName))) {
                @unlink(public_path('images/executive_committee/' . $photoName));
            }
            $photoName = rand(10000, 99999) . "executive." . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/executive_committee'), $photoName);
        }

        DB::table('executive_committee')->where('id', $id)->update([
            'parent_id'   => $request->parent_id ?: null,
            'name'        => $request->name,
            'designation' => $request->designation,
            'bio'         => $request->bio,
            'photo'       => $photoName,
            'facebook'    => $request->facebook,
            'twitter'     => $request->twitter,
            'instagram'   => $request->instagram,
            'youtube'     => $request->youtube,
            'order'       => $request->order ?? 0,
        ]);

        return redirect()->back()->with('update', 'Successfully updated');
    }
}
