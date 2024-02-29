<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>{{ $title }}</title>
  </head>
  <body>
    <section style="background-color: #486EDB">
      <div class="container py-2 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card mb-5" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="card-body p-2 p-lg-5 text-black">
                  <form action="{{ route('formreq.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #486EDB;"></i>
                      <span class="h1 fw-bold mb-0">Raharcons</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Please fill out the form below!</h5>
                    
                    <div class="form-outline mb-1">
                      <input type="text" name="nama_project" id="nama_project" class="form-control form-control-lg @error('nama_project') is-invalid @enderror" value="{{ old('nama_project') }}" required autocomplete='off'/>
                      <label class="form-label" for="nama_project">Nama proyek</label>
                      @error('nama_project')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-1">
                      <input type="text" name="categories" id="categories" class="form-control form-control-lg @error('categories') is-invalid @enderror" value="{{ old('categories') }}" required autocomplete='off'/>
                      <label class="form-label" for="categories">Kategori</label>
                      @error('categories')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-1">
                      <input type="text" name="lokasi" id="lokasi" class="form-control form-control-lg @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" required autocomplete='off'/>
                      <label class="form-label" for="lokasi">Lokasi</label>
                      @error('lokasi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-1">
                      <input type="number" name="luas_area" id="luas_area" class="form-control form-control-lg @error('luas_area') is-invalid @enderror" value="{{ old('luas_area') }}" required autocomplete='off'/>
                      <label class="form-label" for="luas_area">Luas area</label>
                      @error('luas_area')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-1">
                      <input type="number" name="dana" id="dana" class="form-control form-control-lg @error('dana') is-invalid @enderror" value="{{ old('dana') }}" required autocomplete='off'/>
                      <label class="form-label" for="dana">Dana</label>
                      @error('dana')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-1">
                      <input type="text" name="time_plan" id="time_plan" class="form-control form-control-lg @error('time_plan') is-invalid @enderror" value="{{ old('time_plan') }}" required autocomplete='off'/>
                      <label class="form-label" for="time_plan">Rentang waktu</label>
                      @error('time_plan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-2">
                      <div class="mb-3">
                        <input class="form-control" type="file" id="image" name="image">  
                        <label for="image" class="form-label @error('image') is-invalid @enderror">Upload gambar</label>
                      </div>
                      @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-1">
                      <textarea style="height: 130px" name="more_desc" id="more_desc" class="form-control form-control-lg @error('more_desc') is-invalid @enderror" value="{{ old('more_desc') }}" autocomplete='off'/></textarea>
                      <label class="form-label" for="more_desc">Deskripsi tambahan (<strong class="text-primary"> Optional </strong>)</label>
                      @error('more_desc')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-primary btn-block" type="submit">Send</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Script --}}
    <script src="{{ url('https://kit.fontawesome.com/e632a4a2d6.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>