<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'project_name' => 'Free sheep distribution program',
                'objectives' => "- Free sheep have been distributed to poor families in the project area. \n- Sheep rearing and income-generating training has been provided to the beneficiaries. As a result of the said training, the beneficiaries have gained experience on sheep rearing methods, sheep housing, sheep breeding and care of pregnant sheep, care of newborn sheep, marketing and income expenditure accounting methods, etc. \n- By seeing the practical work of the direct beneficiaries, the indirect beneficiaries will be motivated to breed and market sheep. \n-In practical terms, the beneficiaries, especially women, will be empowered in their daily lives, self-employment opportunities will be created, and they will benefit financially.",
                'locations' => 'Derai Upazila of Sunamgonj District',
                'project_duration' => '2022 to Continue',
                'donors' => 'Bangladesh NGO Foundation (BNF)',
                'total_beneficiary' => 'Total Beneficiary: 297',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Out of School Children Education Programm',
                'objectives' => 'To provide primary education as second chance opportunity for the out of school children (dropped out and never enrolled) of 8-14 years age group through Non- formal Education system and to bring them into the mainstream of formal education system.',
                'locations' => 'Barlekha Upazila of Moulvibazar District',
                'project_duration' => 'From 2021 to 2024',
                'donors' => 'Bureu of Non Formal Education(BNFE) Under the Ministry of Primary and Mass Education',
                'total_beneficiary' => 'Total learners: 2100',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Basic Literacy Project (64 District)',
                'objectives' => "-Providing Basic Literacy and life skill to targeted illiteracy adolescents and adults of 15 – 45 age groups. \n-To contribute in eradication of illiteracy from the country as well as achieving global and national EFA goals as envisaged in NPA -11 and the sixth five years plan. \n-To contribution in implementation of the national NFP poolicy-2006 and the national Education policy-2010. \n-To promote GO-NGO and community collaboration in NFP sector.",
                'locations' => 'Jamalganj upazila of Sunamganj District',
                'project_duration' => 'From 2020 to 2022',
                'donors' => 'Bureau of Non Formal Education, Under the Ministry of Primary and Mass Education',
                'total_beneficiary' => 'Total learners: 18000',
                'status' => 'completed',
            ],
            [
                'project_name' => 'Pure water and sanitation program',
                'objectives' => '-The Organization has been distributing Deep Tubewell and sanitary latrine to the community. It`s programme Per year 500 hundred beneficiary will get opportunity and 300 hundred learner will get hand wash training',
                'locations' => 'Derai Upazila of Sunamgonj District',
                'project_duration' => 'From 2015 to 2022',
                'donors' => 'Bangladesh NGO Foundation (BNF)',
                'total_beneficiary' => 'Total Beneficiary: 240', // 240 in doc, note says 500/year
                'status' => 'completed',
            ],
            [
                'project_name' => 'Vulnerable Women Benefit (VWB) Program',
                'objectives' => "-Community mobilization \n- Formation of Group & Institutional development \n-Beneficiaries training on IGAs (poultry, duck, cow, goat rearing, nursery, vegetable garden, Organize life skill Trainings.",
                'locations' => 'Sullah & Tahirpur upazila of Sunamganj district',
                'project_duration' => 'From 2023 to 2024',
                'donors' => 'Department of Women Affairs (DWA), Under the Ministry of Women and Children Affairs',
                'total_beneficiary' => 'Total Beneficiary: 3053',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Science Awareness Program',
                'objectives' => "Workshop on science awareness among Childs and Adolescents \n• Science awareness rally at project area \n• Distribution of science books, notebooks & pen to the students",
                'locations' => 'Barlekha Upazila of Moulvibazar District',
                'project_duration' => 'Frrom 2022 to 2023',
                'donors' => 'Ministry of Science and Technology of Bangladesh',
                'total_beneficiary' => 'Total Beneficiary: 4500',
                'status' => 'completed',
            ],
            [
                'project_name' => 'Vulnerable group Development (VGD) Programme',
                'objectives' => "-Implement the positive development activities of the socio-economic conditions of VGD beneficiaries \n-Providing various training on IGA and life skills for the self-employment of the beneficiaries \n-Provide support services including collection and management of savings \n-Empowering beneficiaries by economic and social empowerment",
                'locations' => 'Chattak and Duwarabazar Uazila of Sunamganj district',
                'project_duration' => 'From 2021 to 2022',
                'donors' => 'Department of Women Affairs (DWA), Under the Ministry of Women and Children Affairs',
                'total_beneficiary' => 'Total VGD Beneficiary: 2852',
                'status' => 'completed',
            ],
            [
                'project_name' => 'Daridra Maa`s Janna Matrittacal Bhata prodan Programme',
                'objectives' => "-Ensuring gestational care to poor pregnant and low income working mothers to meet the health and nutrition needs of the first important 1000 days of childbirth and develop the intellect. \n-Empowering beneficiaries by economic and social empowerment",
                'locations' => 'Derai, Jamalganj, Sunamganj Sadar, Duwara Bazar, Biswamborpur, Tahirpur',
                'project_duration' => 'From 2021 2022 to 2023 - 2024',
                'donors' => 'Department of Women’s Affairs Under the Ministry of Women and Children Affairs',
                'total_beneficiary' => 'Total Beneficiary: 4751',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Seedling distribution and Environmental Awareness Program',
                'objectives' => "- conducted environmental awareness program in the form of group meetings such as “yard meeting” \n- Seedling distribution",
                'locations' => 'Derai of Sunamganj district.',
                'project_duration' => 'From 2022 to continue',
                'donors' => 'Department of social welfare',
                'total_beneficiary' => 'Total Beneficiary: 10388',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Fisheries Development',
                'objectives' => "- Land Development \n- Fish Culture \n- Group Formation",
                'locations' => 'Derai Upazila of Sunamgonj',
                'project_duration' => 'From June 2000 to till date',
                'donors' => 'Own fund of UERD and Beneficiary of local Community',
                'total_beneficiary' => 'Total Beneficiary: 150',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Duck Rearing',
                'objectives' => "- Group Member selection \n- Distribution of Ducklings \n- Duck rearing \n- Egg Marketing \n- Duck Marketing",
                'locations' => 'Derai Upazila of Sunamgonj district',
                'project_duration' => 'From 2003 to till date',
                'donors' => 'Own fund of UERD and Beneficiary of local Community',
                'total_beneficiary' => 'Total Beneficiary: 50',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Non- Formal Primary Education program (Class-1 to Class5)',
                'objectives' => "- The participants will know about the background of NEPE and ESP. \n- They will know about the level of achievement of NEPE and will be able to understand the factors success. \n- They will understand the main futures of ESP NFPE. \n- They will have a clear picture of what actually goes on in a NFPE classroom. \n- They will understand the implementation strategies of ESP projects. \n- They will be able to allocate resources to their NEPE program efficiently.",
                'locations' => 'Derai Upazila of Sunamgonj',
                'project_duration' => 'From 2009 to 2015',
                'donors' => 'BRAC',
                'total_beneficiary' => 'Total learners: 450',
                'status' => 'completed',
            ],
            [
                'project_name' => 'Pre Primary education',
                'objectives' => "-To increase the quality of primary education \n- To increase the intention and primary cycle completion rate \n- To create a model of community participation in pre-primary education program",
                'locations' => 'South Surma Upazilla of Sylhet District',
                'project_duration' => 'From 2015 to 2016',
                'donors' => 'Human Development Foundation (H D F)',
                'total_beneficiary' => 'Total learners: 150',
                'status' => 'completed',
            ],
            [
                'project_name' => 'Formal Education Programme',
                'objectives' => "- campaign for good teaching method \n- campaign for government accountability in education \n- Map the school scores and publish the rankings \n- Signature campaign \n- Community outreach \n- Support men and women to set up /strengthening SMCs and PTAs-Target beneficiaries/ stakeholders",
                'locations' => 'Derai and Sulla Upazilla of Sunamgonj District',
                'project_duration' => 'From 2011 to 2016',
                'donors' => 'Amar Adhikar Fundation (A O F)',
                'total_beneficiary' => 'Total learners: 3000',
                'status' => 'completed',
            ],
            [
                'project_name' => 'Mother and Child Health Care program',
                'objectives' => "- Health campaign \n- Extreme poor Women’s will get to serve \n- Distribution medicine \n- Awareness programme",
                'locations' => 'Derai and Sulla Upazilla of Sunamgonj District',
                'project_duration' => 'From 2011 to Continuing',
                'donors' => 'Ministry of health and filmily welfare',
                'total_beneficiary' => 'Total Beneficiary: 150',
                'status' => 'ongoing',
            ],
            [
                'project_name' => 'Protibandhi Development Programme',
                'objectives' => "-To provide financial support for income generating activities for disable people. \n-It`s programme Per year 25 beneficiary (disable people) will get IGA fund and other`s opportunity.",
                'locations' => 'Derai Upazila of Sunamgonj district',
                'project_duration' => 'From 2015 to Continuing',
                'donors' => 'Jatiya Protibondhi Fundation',
                'total_beneficiary' => 'Total Beneficiary: 75',
                'status' => 'ongoing',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
