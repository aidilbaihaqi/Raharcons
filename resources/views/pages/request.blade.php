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
            <h1 class="h3 mb-2 text-gray-900">Request</h1>
          </div>

          @if(session()->has('destroySuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('destroySuccess') }}
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
                            <th>Sent At</th>
														<th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      @foreach ($request as $rq)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $rq->nama_project }}</td>
												<td>{{ $rq->categories }}</td>
												<td>{{ $rq->lokasi }}</td>
												<td>{{ $rq->created_at->format("F j, Y, g:i a") }}</td>
												<td>
													<a href="{{ route('request.show', $rq->id) }}" class="btn btn-info btn-circle btn-sm" style="margin-bottom: 7px">
														<i class="fas fa-info-circle"></i>
													</a>
													<a href="#" type="button" class="btn btn-success btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#modal_{{ $rq->id }}" style="margin-bottom: 8px">
														<i class="fas fa-check"></i>
													</a>
                          <a href="{{ route('request.destroy', $rq->id) }}" class="btn btn-danger btn-circle btn-sm" style="margin-bottom: 7px">
                            <i class="fas fa-ban"></i>
                          </a>   
												</td>
										  </tr>
                        <div class="modal fade" id="modal_{{ $rq->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{  $rq->nama_project }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method = "POST" action = "{{  route('request.approve', ['req' => $rq]) }}">
                                @csrf
                                <div class="modal-body">
                                  Masukkan nama Mandor
                                  <select name = "mandor" class="form-select" aria-label="Default select example">
                                    @foreach($mandor as $m)
                                      <option value="{{ $m->name }}">{{ $m->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type = "submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
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