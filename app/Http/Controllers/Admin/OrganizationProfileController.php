<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationProfile;

class OrganizationProfileController extends Controller
{
    public function index()
    {
        $orgProfile = OrganizationProfile::first();
        if (!$orgProfile) {
            $orgProfile = new OrganizationProfile();
        }
        return view('admin.organization_profile.index', compact('orgProfile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'nullable|string',
            'head_office_address' => 'nullable|string',
            'liaison_office_address' => 'nullable|string',
            'email' => 'nullable|string',
            'phone' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'establishment_year' => 'nullable|date',
            'organization_type' => 'nullable|string',
            'ngo_bureau_reg_no' => 'nullable|string',
            'ngo_bureau_reg_date' => 'nullable|date',
            'social_welfare_reg_no' => 'nullable|string',
            'social_welfare_reg_date' => 'nullable|date',
            'background_info' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
        ]);

        $orgProfile = OrganizationProfile::first();
        if (!$orgProfile) {
            OrganizationProfile::create($request->all());
        } else {
            $orgProfile->update($request->all());
        }

        return redirect()->back()->with('success', 'Organization Profile Updated Successfully');
    }
}
