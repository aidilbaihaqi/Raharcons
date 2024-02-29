@extends('layouts.main')

@section('container')
  {{-- Page Wrapper --}}
  <div id="wrapper">
    
    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">
      {{-- Main Content --}}
      <div id="content">
        {{-- Topbar --}}
        @include('partials.topbar')

        {{-- Begin Page Content --}}
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="card p-3 border-0 shadow-sm mb-3">
              <h1 class="h3 mb-2 text-gray-900">Project - Detail</h1>
          </div>


          <div class="row">

            <!-- Data Form -->
            <div class="col-xl-8 col-lg-7" >
                <div class="card shadow mb-4" style="height: fit-content;">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data form</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <table class="table">
                        <tbody>
                            <tr>
                                <th>Nama Project</th>
                                <td>{{ $project->nama_project }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $project->categories }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ $project->lokasi }}</td>
                            </tr>
                            <tr>
                                <th>Luas area</th>
                                <td>{{ $project->luas_area }}</td>
                            </tr>
                            <tr>
                                <th>Mandor</th>
                                <td>{{ $project->nama_mandor }}</td>
                            </tr>
                            <tr>
                                <th>Dana</th>
                                <td>Rp {{ $project->dana }}</td>
                            </tr>
                            <tr>
                                <th>Rentang waktu</th>
                                <td>{{ $project->time_plan }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi tambahan</th>
                                <td>{{ $project->more_desc }}</td>
                            </tr>
                            <tr>
                                <th>Accepted at</th>
                                <td>{{ $project->created_at->format("F j, Y, g:i a")}}</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Gallery</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @if ($project->image)
                            <div>
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->nama_project }}" class="img-fluid my-3">
                            </div>
                        @else
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            </div>

            @if(auth()->user()->level != 0)
        	</div>

					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="card shadow m-4">
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">
                                            Monitoring
                                        </h6>
										@if (auth()->user()->level == 1)
                                            <a href="{{ route('monitoring.create', ['id' => $project->id]) }}" class="btn btn-sm ms-2 btn-primary p-2">Request Item</a>
                                        @endif
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
														<thead>
															<tr>
																<th>Item</th>
																<th>Kuantitas</th>
																<th>Harga</th>
																<th>Jenis</th>
																<th>Source</th>
																<th>Created_at</th>
															</tr>
														</thead>
														<tfoot>
															<tr>
																<th>Item</th>
																<th>Kuantitas</th>
																<th>Harga</th>
																<th>Jenis</th>
																<th>Source</th>
																<th>Created_at</th>
															</tr>
														</tfoot>
														<tbody>
                                                            @foreach ($monitoring as $m)
                                                                <tr>
                                                                    <td>{{ $m->item }}</td>
                                                                    <td>{{ $m->kuantitas }} kg</td>
                                                                    <td>Rp. {{ $m->harga }}</td>
                                                                    <td>{{ $m->jenis }}</td>
                                                                    <td><img src="{{ asset('storage/' . $m->source) }}" width="100" alt="{{ $m->item}}"></td>
                                                                    <td>{!! $m->created_at . "<br>" . $m->created_at->diffForHumans() !!}</td>
                                                                </tr>
                                                            @endforeach
														</tbody>
												</table>
										</div>
								</div>
						</div>
						</div>
			</div>
            @endif
      </div>

      {{-- Project --}}
      @include('partials.footer')
    </div>

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
	</a>

@endsection