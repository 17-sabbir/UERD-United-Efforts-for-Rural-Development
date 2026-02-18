<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpoweringLivesController extends Controller
{
    public function create()
    {
        $data = DB::table('empowering_lives')->first();
        return view('admin.empowering_lives.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Subtitle and Image removed
        ]);

        $data = DB::table('empowering_lives')->first();

        if ($data) {
            DB::table('empowering_lives')->where('id', $data->id)->update([
                'title' => $request->title,
                // 'subtitle' => $request->subtitle, (removed)
                'description' => $request->description,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('empowering_lives')->insert([
                'title' => $request->title,
                'subtitle' => '', // Default empty if column still exists
                'description' => $request->description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Info updated successfully.');
    }
}
