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
            <h1 class="h3 mb-2 text-gray-900">Monitoring Data - Create</h1>
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
              <div class="card-header py-3 d-flex flex-row align-kuantitass-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah data ke Tabel Monitoring</h6>
              </div>

              {{-- Card Body --}}
              <div class="card-body">
                <form action="{{ route('monitoring.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="text" hidden name="id_project" value = "{{ $id }}" class="form-control @error('item') is-invalid @enderror" id="item" required>

                  <div class="mb-3">
                    <label class="text-black" for="item" class="form-label">Item</label>
                    <input type="text" name="item" class="form-control @error('item') is-invalid @enderror" id="item" required>
                    @error('item')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <div class="row g-3 align-items-center">
                      <div class="col-xs-8">
                        <label class="text-black" for="kuantitas" class="form-label">Kuantitas</label>
                        <input type="number" name="kuantitas" class="form-inline form-control @error('kuantitas') is-invalid @enderror" id="kuantitas" required>
                        @error('kuantitas')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="col-xs-4">
                        <label class="text-black" for="unit" class="form-label">Unit</label>
                        <input type="text" name="unit" class="form-inline form-control @error('unit') is-invalid @enderror" id="kuantitas" required>
                        @error('unit')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>

                    
                    {{-- <label class="text-black" for="kuantitas" class="form-label">Kuantitas</label>
                    <input type="number" name="kuantitas" class="form-inline form-control @error('kuantitas') is-invalid @enderror" id="kuantitas" required>
                    @error('kuantitas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                    <div class="mb-3">
                      <label class="text-black" for="unit" class="form-label">Unit</label>
                      <input type="text" name="unit" class="form-inline form-control @error('unit') is-invalid @enderror" id="kuantitas" required>
                      @error('unit')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div> --}}
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" required>
                    @error('harga')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="jenis" class="form-label">Jenis</label>
                    <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis" required>
                    @error('jenis')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="image" class="text-black @error('image') is-invalid @enderror">Upload gambar</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror  
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection