@extends('app-layouts.index')

@section('content')
<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 mt-5">
          <img src="{{ asset('frontend/assets/img') }}/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 mt-4">
          <h3>Tentang Posyandu Melati 04</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <ul>
            <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
          </ul>
          <div class="row icon-boxes">
            <div class="col-md-6">
              <i class="bx bx-receipt"></i>
              <h4>Corporis voluptates sit</h4>
              <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <i class="bx bx-cube-alt"></i>
              <h4>Ullamco laboris nisi</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Pelayanan</h2>
        <p>Kegiatan posyandu terdiri dari kegiatan utama dan kegiatan pengembangan</p>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="icon-box">
            <i class="bi bi-briefcase"></i>
            <h4><a href="#">Pendataan status gizi anak</a></h4>
            <p>meliputi penimbangan berat dan pengukuran tinggi badan, deteksi dini gangguan pertumbuhan, penyuluhan gizi, dan pemberian suplemen.</p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="bi bi-card-checklist"></i>
            <h4><a href="#">Imunisasi anak</a></h4>
            <p>imunisasi untuk anak-anak bertujuan untuk mencegah terjadinya penyakit infeksi yang berbahaya.</p>
          </div>
        </div>
        <div class="col-md-6 mt-4">
          <div class="icon-box">
            <i class="bi bi-bar-chart"></i>
            <h4><a href="#">Program kesehatan bayi dan anak balita</a></h4>
            <p>Jenis pelayanan yang diselenggarakan posyandu untuk balita mencakup penimbangan berat badan, pengukuran tinggi badan dan lingkar kepala anak, evaluasi tumbuh kembang, serta penyuluhan dan konseling tumbuh kembang.</p>
          </div>
        </div>
        <div class="col-md-6 mt-4">
          <div class="icon-box">
            <i class="bi bi-binoculars"></i>
            <h4><a href="#">Pencegahan dan penanggulangan diare</a></h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
        </div>
        <div class="col-md-6 mt-4">
          <div class="icon-box">
            <i class="bi bi-brightness-high"></i>
            <h4><a href="#">Program kesehatan ibu hamil dan menyusui</a></h4>
            <p>Pelayanan yang diberikan posyandu kepada ibu hamil mencakup pemeriksaan kehamilan dan pemantauan gizi. Tak hanya pemeriksaan, ibu hamil juga dapat melakukan konsultasi terkait persiapan persalinan dan pemberian ASI.</p>
          </div>
        </div>
        <div class="col-md-6 mt-4">
          <div class="icon-box">
            <i class="bi bi-calendar4-week"></i>
            <h4><a href="#">Keluarga Berencana (KB)</a></h4>
            <p>Pelayanan KB di posyandu umumnya diberikan oleh kader dalam bentuk pemberian kondom dan pil KB.</p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Kegiatan</h2>
        <p>Info Seputar Kegiatan Posyandu Melati 04</p>
      </div>

      <div class="row">
        @foreach ($data as $item)
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card mb-5 shadow-sm">
            @if($item->image)
            <img src="{{ asset('storage/'. $item->image) }}" style="height:280px;" class="img-fluid">
            @endif
            <div class="card-body">
              <div class="card-title">
                <h2>{{ $item->title }}</h2>
              </div>
              <div class="card-text">
                <p>
                  {{ $item->body }}
                </p>
              </div>
              <p class="card-text">
                <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</small>
              </p>
              <a href="#" class="btn btn-outline-primary rounded-0 float-end"
                >Read More</a
              >
            </div>
          </div>
        </div>
        @endforeach
      </div>
     {{-- <div class="row">
      @foreach ($data as $item)
          <div class="col-md-4 mb-3 justify-content-center">
            <div class="card mx-" style="width: 25rem;">
              @if($item->image)
                <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid">
                </div>
              @endif
              <div class="card-body">
                <h5 class="card-title text-center fw-bold">{{ $item->title }}</h5>
                <p>{{ $item->body }}</p>
                <p class="card-text">
                  <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</small>
                </p>
                <a href="#" class="btn btn-md btn-primary">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach
     </div> --}}

    </div>
  </section><!-- End Testimonials Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Lokasi</h2>
        <p>Lokasi Posyandu Melati 04</p>
      </div>

        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.79137365949734!2d106.85884798876943!3d-6.437441095979054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ea5c1fbcb78b%3A0x5a1eeae02b3a6b7f!2sAula%20Melati!5e0!3m2!1sid!2sid!4v1673397024926!5m2!1sid!2sid" allowfullscreen="" frameborder="0"></iframe>
        </div><!-- End Google Maps -->

    </div>
  </section><!-- End Contact Section -->

</main>
@endsection