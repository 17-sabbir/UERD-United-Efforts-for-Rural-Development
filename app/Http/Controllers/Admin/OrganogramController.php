<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organogram;
use Illuminate\Support\Facades\File;

class OrganogramController extends Controller
{
    public function index()
    {
        $organogram = Organogram::first();
        return view('admin.organogram.index', compact('organogram'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_path' => 'required|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $organogram = Organogram::first() ?? new Organogram();

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Delete old file if exists
            if ($organogram->file_path && File::exists(public_path($organogram->file_path))) {
                File::delete(public_path($organogram->file_path));
            }

            $file->move(public_path('uploads/organogram'), $filename);
            $organogram->file_path = 'uploads/organogram/' . $filename;
            $organogram->save();
        }

        return redirect()->back()->with('success', 'Organogram uploaded successfully!');
    }
}
