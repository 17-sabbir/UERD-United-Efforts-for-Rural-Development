@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>What We Do</li>
      </ol>
      <h2>Ongoing Project</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

      <div class="section-title">
        <h2>Ongoing Project</h2>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped table-hover align-middle" style="min-width: 1000px;">
                <thead class="bg-secondary text-white text-center">
                    <tr>
                        <th scope="col" style="width: 5%">Sl-no.</th>
                        <th scope="col" style="width: 20%">Project Name</th>
                        <th scope="col" style="width: 25%">Objective of the Project</th>
                        <th scope="col" style="width: 15%">Locations</th>
                        <th scope="col" style="width: 10%">Project duration</th>
                        <th scope="col" style="width: 15%">Donors</th>
                        <th scope="col" style="width: 10%">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $key=>$data)
                    <tr>
                        <td class="text-center">{{ $project->firstItem() + $key }}.</td>
                        <td>
                            <a href="{{ route('ongoing.project.view',$data->id) }}" class="text-decoration-none fw-bold text-dark">
                          {{ $data->project_name }}
                            </a>
                        </td>
                      <td>{{ $data->objectives }}</td>
                      <td>{{ $data->locations }}</td>
                      <td class="text-center">{{ project_period($data) }}</td>
                        <td>{{ $data->donors }}</td>
                        <td>{{ $data->remark }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $project->links() }}
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">

    </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
