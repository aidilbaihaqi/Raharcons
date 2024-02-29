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
            <h1 class="h3 mb-2 text-gray-900">Data User</h1>
          </div>

          @if(session()->has('editSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('editSuccess') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(session()->has('destroySuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('destroySuccess') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- Datatable - User --}}
          <div class="card-body bg-white rounded mb-4">
            <div class="table-responsive">
                <table class="table table-hover border-black p-0" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-black">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr class="text-black">
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
                    <tbody class="text-gray-900">
                      @foreach ($user as $usr)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $usr->name }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ App\Http\Controllers\UserController::cekLevel($usr->level) }}</td>
                        <td>
                          <a href="{{ route('user.destroy', ['id' => $usr]) }}" class="btn btn-sm btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span>
                          </a>
                          <a href="{{ route('user.edit', ['id' => $usr]) }}" class="btn btn-sm btn-info btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="bi bi-pencil-square"></i>
                            </span>
                            <span class="text">Edit</span>
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
@endsection