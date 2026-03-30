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

    public function managementStructure()
    {
        $orgProfile = OrganizationProfile::first();
        if (!$orgProfile) {
            $orgProfile = new OrganizationProfile();
        }
        return view('admin.management_structure.index', compact('orgProfile'));
    }

    public function updateManagementStructure(Request $request)
    {
        $request->validate([
            'management_content' => 'nullable|string',
            'organogram_pdf'     => 'nullable|mimes:pdf|max:51200', // 50MB max
        ]);

        $data = ['management_content' => $request->management_content];

        if ($request->hasFile('organogram_pdf')) {
            $pdf     = $request->file('organogram_pdf');
            $pdfName = 'organogram_' . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->storeAs('organogram', $pdfName, 'public');
            $data['organogram_pdf'] = 'organogram/' . $pdfName;
        }

        $orgProfile = OrganizationProfile::first();
        if (!$orgProfile) {
            OrganizationProfile::create($data);
        } else {
            $orgProfile->update($data);
        }

        return redirect()->back()->with('success', 'Management Structure content updated successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'organization_name'         => 'nullable|string',
            'head_office_address'       => 'nullable|string',
            'liaison_office_address'    => 'nullable|string',
            'email'                     => 'nullable|string',
            'phone'                     => 'nullable|string',
            'contact_person'            => 'nullable|string',
            'establishment_year'        => 'nullable|date',
            'organization_type'         => 'nullable|string',
            'ngo_bureau_reg_no'         => 'nullable|string',
            'ngo_bureau_reg_date'       => 'nullable|date',
            'social_welfare_reg_no'     => 'nullable|string',
            'social_welfare_reg_date'   => 'nullable|date',
            'background_info'           => 'nullable|string',
            'vision'                    => 'nullable|string',
            'mission'                   => 'nullable|string',
            'management_description'    => 'nullable|string',
            'organogram_pdf'            => 'nullable|mimes:pdf|max:51200', // 50MB max
        ]);

        $data = $request->except(['_token', 'organogram_pdf']);

        // Handle PDF upload
        if ($request->hasFile('organogram_pdf')) {
            $pdf = $request->file('organogram_pdf');
            $pdfName = 'organogram_' . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->storeAs('organogram', $pdfName, 'public');
            $data['organogram_pdf'] = 'organogram/' . $pdfName;
        }

        $orgProfile = OrganizationProfile::first();
        if (!$orgProfile) {
            OrganizationProfile::create($data);
        } else {
            $orgProfile->update($data);
        }

        return redirect()->back()->with('success', 'Organization Profile Updated Successfully');
    }
}
