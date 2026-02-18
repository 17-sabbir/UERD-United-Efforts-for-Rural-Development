<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\OrganizationProfile::create([
            'organization_name' => 'United Efforts for Rural Development [UERD]',
            'head_office_address' => "Milon bazar,\nPost Office: Charnarchar,\nUpazila: Derai,\nDistrict: Sunamgonj.",
            'liaison_office_address' => "House # 25, Road # 11,\nBlock-Kha, P.C Culture Society\nMohammadpur, Dhaka-1207.",
            'email' => 'uerd5678@gmail.com, rabicoming2009@yahoo.com',
            'phone' => '01720-566027',
            'contact_person' => 'Rabindu Chandra Roy',
            'establishment_year' => '2000-06-06',
            'organization_type' => 'Non-government, nonprofit and non-political Voluntary social development organization.',
            'ngo_bureau_reg_no' => '2922',
            'ngo_bureau_reg_date' => '2015-04-07',
            'social_welfare_reg_no' => 'Sunam- 784/08',
            'social_welfare_reg_date' => '2008-11-23',
            'background_info' => "UERD a non-government, non-profit and non-political voluntary development organization put its first footstep into the development arena in the year 2000. Some dynamic young people of Derai upazila of Sunamgonj district first thought about the organization. The total scenario of poverty, illiteracy, gender imbalance, disregard towards women and other social injustice make them concern and force them to do something for the society and for the people of Sunamganj. From this point of situation, the organization has come to existence. Since its inception, the organization has been working mainly in the field of Micro-Credit, Non-formal primary education, Fisheries Development, Duck rearing, Nursery Development, Disaster Management Program, Sewing Machine distribution and training, awareness campaign on health/sanitation and mother and child care, women empowerment, gender equity etc. It also ensures and strives the basic needs of the vulnerable poor people through an integrated sustainable development package program.",
            'vision' => 'A society where people live in dignity and security with gender balanced Environment.',
            'mission' => 'Works together with disadvantage poor community people to eliminate poverty and gender discrimination.',
        ]);
    }
}
