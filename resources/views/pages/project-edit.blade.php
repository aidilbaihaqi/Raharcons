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
            <h1 class="h3 mb-2 text-gray-900">Project - Edit</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          </div>

          <div class="row">
            {{-- Form Edit --}}
          <div class="col-xl-8 col-lg-7" >
            <div class="card shadow mb-4" style="height: fit-content;">
              {{-- Card Header --}}
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Project</h6>
              </div>

              {{-- Card Body --}}
              <div class="card-body">
                <form action="{{ route('project.update', $project->id) }}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label class="text-black" for="nama_project" class="form-label">Nama Project</label>
                    <input type="text" name="nama_project" class="form-control" id="nama_project" value="{{ $project->nama_project }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="categories" class="form-label">Kategori</label>
                    <input type="text" name="categories" class="form-control" id="categories" value="{{ $project->categories }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ $project->lokasi }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="luas_area" class="form-label">Luas area</label>
                    <input type="text" name="luas_area" class="form-control" id="luas_area" value="{{ $project->luas_area }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="nama_mandor" class="form-label">Mandor</label>
                    <input type="text" name="nama_mandor" class="form-control" id="nama_mandor" value="{{ $project->nama_mandor }}" disabled>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="dana" class="form-label">Dana</label>
                    <input type="text" name="dana" class="form-control" id="dana" value="{{ $project->dana }}" disabled>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="time_plan" class="form-label">Rentang waktu</label>
                    <input type="text" name="time_plan" class="form-control" id="time_plan" value="{{ $project->time_plan }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="more_desc" class="form-label">Deskripsi</label>
                    <input type="text" name="more_desc" class="form-control" id="more_desc" value="{{ $project->more_desc }}" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Change</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection