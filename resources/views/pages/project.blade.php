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
            <h1 class="h3 mb-2 text-gray-900">Project</h1>
          </div>
          
          @if(session()->has('approveSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('approveSuccess') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if(session()->has('destroySuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('destroySuccess') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if(session()->has('editSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('editSuccess') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

					{{-- Datatable - Project --}}
          <div class="card-body bg-white rounded mb-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-black">
                            <th>#</th>
                            <th>Project</th>
                            <th>Categories</th>
                            <th>Location</th>
														<th>Mandor</th>
                            <th>Accepted At</th>
														<th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
											@foreach ($project as $p)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $p->nama_project }}</td>
                          <td>{{ $p->categories }}</td>
                          <td>{{ $p->lokasi }}</td>
                          <td>{{ $p->nama_mandor }}</td>
                          <td>{{ $p->created_at->format("F j, Y, g:i a") }}</td>
                          <td>
                            <a href="{{ route('project.show', $p->id) }}" class="btn btn-success btn-circle btn-sm" style="margin-bottom: 7px">
                              <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ route('project.edit', $p->id) }}" class="btn btn-info btn-circle btn-sm" style="margin-bottom: 8px">
                              <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('project.destroy', $p->id) }}" class="btn btn-danger btn-circle btn-sm" style="margin-bottom: 7px">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      @endforeach
										</tbody>
                </table>
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