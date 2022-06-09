@extends('layouts.user')

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

@section('title')
    Home
@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Sistem Informasi Pendataan Prestasi SMPN 4 Kota Bengkulu</h1>
        <h2>Teruslah melangkah meski itu pelan karena dengan melangkah akan menjadikan kita semakin dekat dengan tujuan dan prestasi yang diinginkan</h2>
        <div class="d-flex justify-content-center justify-content-lg-start">
            @if (Auth::user())
            <a href="{{ route('dashboard') }}" class="btn-get-started scrollto">DASHBOARD</a>
            @else
            <a href="{{ route('login') }}" class="btn-get-started scrollto">LOGIN</a>
            @endif
          {{--  <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>  --}}
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ url('frontend/assets/img/8601.png') }}" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->
<main id="main">
    {{--  <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ url('frontend/assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ url('frontend/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ url('frontend/assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ url('frontend/assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ url('frontend/assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ url('frontend/assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->  --}}

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Visi Misi</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" style="text-align: justify">
            <p>
                VISI : <br>
                <i>UNGGUL DALAM PRESTASI DENGAN PENGUASAAN IPTEK BERLANDASKAN IMTAQ, BUDI PEKERTI LUHUR, BERWAWASAN LINGKUNGAN DAN BERBUDAYA JUJUR.</i>
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" style="text-align: justify">
            <p>
                MISI : <br>
                1. Meningkatkan wawasan pengetahuan keagamaan yang didasar keimanan dan ketaqwaan Tuhan Yang Maha Esa; <br>
                2. Melaksanakan pembelajaran secara itensif, terjadwal, efektif dan efisien bagi guru dan siswa; <br>
                3. Menumbuhkan semangat keunggulan pada warga sekolah dan membudayakan sikap peduli terhadap lingkungan; <br>
                4. Melengkapi dan memberdayakan media pembelajaran secara maksimal untuk meningkatkan prestasi akademik siswa; <br>
                5. Menyelenggarakan program kegiatan kompetensi dan kompetisi bagi pengembangan profesi guru dan prestasi; <br>
                6. Menjalin kerja sama antara sekolah, orang tua siswa, komite sekolah dan stake holder secara rutin; <br>
                7. Melengkapi sara prasarana seni budaya, olahraga, kepemimpinan dan kreasi seni guna meningkatkan prestasi dalam bidang non akademik.
            </p>
            {{--  <a href="#" class="btn-learn-more">Learn More</a>  --}}
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-title">
            <h2>Prestasi</h2>
          </div>

        <div class="row content">

          <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    @if (Auth::user())
                    <a href="{{ route('prestasi.kelola') }}" class="btn btn-learn-more mb-3">Kelola Prestasi</a>
                    @else
                    <a href="{{ route('prestasi.kelola') }}" class="btn btn-learn-more mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Kelola Prestasi</a>
                    @endif

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center" style="color: #37517E">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Prestasi</th>
                                <th>Penyelenggara</th>
                                <th>Tingkat</th>
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
                                </tr>
                                @empty
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ url('frontend/assets/img/skills.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">HTML <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">CSS <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">JavaScript <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Photoshop <i class="val">55%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berita</h2>
          {{--  <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>  --}}
        </div>

        <div class="row justify-content-center">
            @foreach ($berita as $item)
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in">
                <div class="icon-box">
                  <h4>{{ $item->judul }}</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalberita{{ $item->id }}">
                    Lihat Berita
                  </button>
                </div>
              </div>
            @endforeach


          {{--  <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in">
            <div class="icon-box">
              <h4><a href="">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in">
            <div class="icon-box">
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in">
            <div class="icon-box">
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>  --}}

        </div>

      </div>
    </section><!-- End Services Section -->

    @foreach ($berita as $item2)
    <div class="modal fade" id="modalberita{{ $item2->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">{{ $item2->judul }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {!! $item->isi !!}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-7 d-flex align-items-stretch">
            <div class="info">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63695.24185228511!2d102.292697!3d-3.820306!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe3b2bb139ecba883!2sSMP%204%20Kota%20Bengkulu!5e0!3m2!1sid!2sus!4v1650424634803!5m2!1sid!2sus" frameborder="0" style="border:0; width: 100%; height: 330px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-5 mt-5 mt-lg-0 d-flex align-items-stretch">
            <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Silahkan login terlebih dahulu...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a class="btn btn-primary" href="{{ route('login') }}" >Login</a>
        </div>
        </div>
    </div>
    </div>
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
