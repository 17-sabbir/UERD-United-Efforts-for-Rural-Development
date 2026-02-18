<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevelopmentSustainabilityController extends Controller
{
    public function create()
    {
        $data = DB::table('development_sustainability')->first();
        return view('admin.development_sustainability.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = DB::table('development_sustainability')->first();

        if ($data) {
            DB::table('development_sustainability')->where('id', $data->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('development_sustainability')->insert([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect()->back()->with('success', 'Information updated successfully.');
    }
}
