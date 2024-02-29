@extends('layouts.main')

@section('container')
<!-- Page Wrapper -->
<div id="wrapper">

  {{-- Sidebar --}}
  @include('partials.sidebar')
  {{-- Endsidebar --}}

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        
      {{-- Topbar --}}
      @include('partials.topbar')
      {{-- EndTopbar --}}

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <header  class="page-header page-header-dark pb-10">
          <div class="container-xl px-4">
              <div class="card page-header-content rounded shadow-sm">
                  <div class="row align-items-center justify-content-between">
                      <div class="col-auto m-3">
                          <h1 class="page-header-title text-black">
                              <div class="page-header-icon"><i data-feather="activity"></i></div>
                              Dashboard
                          </h1>
                          <div class="page-header-subtitle">{{ App\Http\Controllers\UserController::cekLevel(Auth::user()->level) }} Panel</div>
                      </div>
                  </div>
              </div>
          </div>
        </header>

        {{-- Main Content --}}
        <div class="container-xl px-4 my-4">
          <div class="row">
            <div class="col-xxl-4 col-xl-12 mb-4">
                <div class="card h-100">
                    <div class="card-body h-100 p-5">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-xxl-12">
                                <div class="text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                    <h3 class="text-primary">Selamat Datang {{ Auth::user()->name }}!</h3>
                                    <p class="text-gray-700 mb-0">Anda masuk sebagai <span class ="text-primary">{{ App\Http\Controllers\UserController::cekLevel(Auth::user()->level) }}</span></p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="img/at-work.svg" style="max-width: 26rem" /></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
            {{-- Project Count Card  --}}
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Project Count</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $project_count }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                  </div>
                  <div class="card-footer d-flex text-primary justify-content-between small mt-2 mb-0">
                    <a class="text-decoration-none" href="{{ route('project.index') }}">Selengkapnya</a>
                    <div class="t"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card  -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $request_count }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  <div class="card-footer d-flex text-warning justify-content-between small mt-2 mb-0">
                    <a class="text-decoration-none text-warning" href="{{ route('request.index') }}">Selengkapnya</a>
                    <div class="t"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
            </div>
          </div>
        </div>

      </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    {{-- Footer --}}
    @include('partials.footer')
    {{-- EndFooter --}}

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
@endsection
