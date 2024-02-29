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
            <h1 class="h3 mb-2 text-gray-900">User - Edit</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
              </div>

              {{-- Card Body --}}
              <div class="card-body">
                <form action="{{ route('user.update', ['id' => $user]) }}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label class="text-black" for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-black" for="level" class="form-label">Level</label>
                    <input type="text" name="level" class="form-control" id="level" value="{{ $user->level }}" required>
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