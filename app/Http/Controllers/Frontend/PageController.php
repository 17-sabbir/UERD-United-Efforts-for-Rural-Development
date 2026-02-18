<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProfile;
use App\Models\Project;

class PageController extends Controller
{
    public function profile()
    {
        $orgProfile = OrganizationProfile::first();

        return view('frontend.pages.profile', compact('orgProfile'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();

        return view('frontend.pages.projects', compact('projects'));
    }
}
