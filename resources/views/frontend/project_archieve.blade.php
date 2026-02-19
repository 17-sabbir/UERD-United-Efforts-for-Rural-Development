@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>What we Do</li>
      </ol>
      <h2>Project Archieve</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Project Archieve</h2>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
            <thead class="bg-danger text-white">
                <tr>
                    <th class="align-middle">Serial</th>
                    <th class="text-start align-middle w-50">Name of the Project</th>
                    <th class="text-start align-middle">Partners/Donors</th>
                    <th class="align-middle text-start">Project Period</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project as $key=>$proj)
                @php
                  $projectName = data_get($proj, 'project_name') ?? data_get($proj, 'name') ?? data_get($proj, 'title');
                  $projectDonors = data_get($proj, 'donors') ?? data_get($proj, 'partners');
                  $projectDuration = data_get($proj, 'project_duration');
                  $fromDate = data_get($proj, 'from_date');
                  $toDate = data_get($proj, 'to_date');
                  $projectPeriod = project_period($proj) ?: trim(($fromDate ?? '').(($fromDate || $toDate) ? ' - ' : '').($toDate ?? ''));
                @endphp
                    <tr>
                        <td class="align-middle">{{ ++$key }}</td>
                  <td class="text-start align-middle">{{ $projectName }}</td>
                  <td class="text-start align-middle">{{ $projectDonors }}</td>
                  <td class="align-middle text-start">{{ $projectPeriod }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
