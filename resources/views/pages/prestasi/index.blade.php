@extends('layouts.content')

@section('title')
    Kelola Prestasi
@endsection

@push('addon-style')
<!-- Custom fonts for this template-->
<link href="{{ url('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ url('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Sistem Informasi Pendataan Prestasi SMPN 4 Kota Bengkulu</h1>
        <h2>Teruslah melangkah meski itu pelan karena dengan melangkah akan menjadikan kita semakin dekat dengan tujuan dan prestasi yang diinginkan</h2>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ url('frontend/assets/img/8601.png') }}" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->
<main id="main">

    <section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-title">
                <h2>Kelola Prestasi</h2>
            </div>
          <div class="row content">

            <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

              <div class="content">
              <div class="card-body">
                  <div class="table-responsive mb-5">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr class="text-center" style="color: #37517E">
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Tanggal</th>
                                  <th>Prestasi</th>
                                  <th>Penyelenggara</th>
                                  <th>Tingkat</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse ($items as $prestasi)
                                  <tr style="color: #9B9CA9">
                                      <td class="text-center">{{ $loop->iteration }}</td>
                                      <td>{{ $prestasi->nama }}</td>
                                      <td>{{ $prestasi->tanggal }}</td>
                                      <td>{{ $prestasi->prestasi }}</td>
                                      <td>{{ $prestasi->penyelenggara }}</td>
                                      <td>{{ $prestasi->tingkat }}</td>
                                      <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#gambarModal{{ $prestasi->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit{{ $prestasi->id }}">
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            <form action="{{ route('prestasi.destroy2', $prestasi->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                  </tr>
                                  @empty
                              @endforelse

                          </tbody>
                      </table>

                  </div>


                    <div class="section-title">
                        <h3>Tambah Prestasi</h3>
                    </div>
                    <form action="{{ route('prestasi.store2') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="prestasi">Prestasi</label>
                                <input type="text" class="form-control @error('prestasi') is-invalid @enderror" id="prestasi" name="prestasi" placeholder="Masukkan Prestasi" value="{{ old('prestasi') }}">
                                @error('prestasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara" value="{{ old('penyelenggara') }}">
                                @error('penyelenggara')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="tingkat">Tingkat</label>
                                <select name="tingkat" id="tingkat" class="form-control" required>
                                    <option value="">Pilih Tingkat</option>
                                    <option value="Kota" @if(old('tingkat') == 'Kota') selected @endif>Kota</option>
                                    <option value="Provinsi" @if(old('tingkat') == 'Provinsi') selected @endif>Provinsi</option>
                                    <option value="Nasional" @if(old('tingkat') == 'Nasional') selected @endif>Nasional</option>
                                    <option value="Internasional" @if(old('tingkat') == 'Internasional') selected @endif>Internasional</option>
                                </select>
                                @error('tingkat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="bukti">Bukti</label>
                                <input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                                @error('bukti')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary w-25" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                    <hr>

              </div>
              </div>

            </div>

          </div>

        </div>
        @foreach ($items as $item2)
        <div class="modal fade" id="modalEdit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('prestasi.update2', $item2->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row"> 
                                <div class="col-lg-4">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $item2->nama }}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="prestasi">Prestasi</label>
                                    <input type="text" class="form-control @error('prestasi') is-invalid @enderror" id="prestasi" name="prestasi" placeholder="Masukkan Prestasi" value="{{ $item2->prestasi }}">
                                    @error('prestasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="penyelenggara">Penyelenggara</label>
                                    <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara" value="{{ $item2->penyelenggara }}">
                                    @error('penyelenggara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="tingkat">Tingkat</label>
                                    <select name="tingkat" id="tingkat" class="form-control">
                                        <option value="">Pilih Tingkat</option>
                                        <option value="Kota" @if($item2->tingkat == 'Kota') selected @endif>Kota</option>
                                        <option value="Provinsi" @if($item2->tingkat == 'Provinsi') selected @endif>Provinsi</option>
                                        <option value="Nasional" @if($item2->tingkat == 'Nasional') selected @endif>Nasional</option>
                                        <option value="Internasional" @if($item2->tingkat) == 'Internasional') selected @endif>Internasional</option>
                                    </select>
                                    @error('tingkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{ $item2->tanggal }}">
                                    @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="bukti">Bukti</label>
                                    <input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                                    @error('bukti')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary w-25" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($items as $item3)
        <div class="modal fade" id="gambarModal{{ $item3->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center mb-5">
                        <h3 class="text-center" style="color: black">{{ $item3->nama }} </h3>
                        <embed src="{{ asset('storage/file-pdf/' . $item3->bukti) }}" width="100%" height="1000"/>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      </section><!-- End Why Us Section -->

  </main><!-- End #main -->
@endsection

@push('addon-script')
<!-- Bootstrap core JavaScript-->
<script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('backend/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/js/demo/datatables-demo.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('backend/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('backend/js/demo/chart-pie-demo.js') }}"></script>

<script>
    $('#dataTable').dataTable( {
        "ordering": false
      } );
</script>
@endpush
