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
              <h1 class="h3 mb-2 text-gray-900">Request - Detail</h1>
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
															<td>{{ $req->nama_project }}</td>
                            </tr>
                            <tr>
															<th>Kategori</th>
															<td>{{ $req->categories }}</td>
                            </tr>
                            <tr>
															<th>Lokasi</th>
															<td>{{ $req->lokasi }}</td>
                            </tr>
                            <tr>
															<th>Luas area</th>
															<td>{{ $req->luas_area }}</td>
                            </tr>
                            <tr>
															<th>Dana</th>
															<td>{{ $req->dana }}</td>
                            </tr>
                            <tr>
															<th>Rentang waktu</th>
															<td>{{ $req->time_plan }}</td>
                            </tr>
                            <tr>
															<th>Deskripsi tambahan</th>
															<td>{{ $req->more_desc }}</td>
                            </tr>
                            <tr>
															<th>Sent at</th>
															<td>{{ $req->created_at->format("F j, Y, g:i a") }}</td>
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
                        @if ($req->image)
                            <div>
                                <img src="{{ asset('storage/' . $req->image) }}" alt="{{ $req->nama_project }}" class="img-fluid my-3">
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

          
        </div>
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