<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class missionController extends Controller
{
    //__Create__//
    public function create(){
        $mission = DB::table('mission_vision')->first();
        return view('admin.mission.create',compact('mission'));
    }

    //__Store__//
    public function store(Request $request){
        $validatedData = $request->validate([
            'vision' => 'required',
            'mission' => 'required',
            'background_image' => 'nullable|mimes:jpg,png,jpeg,gif',
        ]);

        $existing = DB::table('mission_vision')->where('id', 1)->first();
        $backgroundImageName = $existing->background_image ?? null;

        if ($request->boolean('remove_background_image') && !empty($backgroundImageName)) {
            $oldPath = public_path('images/mission_vision/'.$backgroundImageName);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
            $backgroundImageName = null;
        }

        if ($image = $request->file('background_image')) {
            if (!empty($backgroundImageName)) {
                $oldPath = public_path('images/mission_vision/'.$backgroundImageName);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $backgroundImageName = uniqid('', true).'_mission_vision.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/mission_vision/'), $backgroundImageName);
        }

        $matchThese = ['id' => 1];
        DB::table('mission_vision')->updateOrInsert($matchThese, [
            'vision' => $request->vision,
            'mission' => $request->mission,
            'background_image' => $backgroundImageName,
        ]);
        
        return redirect()->back()->with('success','Successfully saved Mission & Vision');
    }
}
