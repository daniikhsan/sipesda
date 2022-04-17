@extends('layouts.landing-page.master')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1><span>{{ env('APP_NAME') }}</span></h1>
    <h2>{{ env('APP_DESC') }} {{ env('VILLAGE_NAME') }}</h2>
    <h2 style="margin-bottom: 15px !important;">Kec.{{ env('VILLAGE_DISTRICT') }} Kab.{{ env('VILLAGE_CITY') }}</h2>
    <div class="d-flex">
      <a href="#" class="btn-get-started scrollto">Ajukan Surat Domisili</a>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Tentang Kami Section ======= -->
  <section id="tentang-kami" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title" style="padding-bottom: 15px;">
        <h2>Tentang Kami</h2>
      </div>
      <div class="row">
        <div class="col-md-12 text-center" style="padding-bottom: 15px;">
          <p><i>{{ env('APP_DESC') }} ({{ env('APP_NAME') }})</i> merupakan perangkat lunak berbasis web yang memberikan pelayanan Administrasi berupa Surat Keterangan Domisili di {{ env('VILLAGE_NAME') }} Kec.{{ env('VILLAGE_DISTRICT') }} Kab.{{ env('VILLAGE_CITY') }}</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <img src="{{asset('template/landing-page/assets/img/about.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <h3>Memudahkan pengajuan Surat Keterangan Domisili.</h3>
          <p class="fst-italic">
            Masyarakat yang ingin mengajukan Surat Keterangan Domisili dapat dengan mudah mengurusnya dimana saja.
          </p>
          <ul>
            <li>
              <i class="bx bx-envelope"></i>
              <div>
                <h5>Mengajukan Pembuatan Surat Keterangan Domisili</h5>
                <p style="margin-bottom:0px;">Pertama, anda harus mengajukan Surat Keterangan Domisili terlebih dahulu disini</p>
                <p style="font-style: italic;">Wajib memiliki akun untuk mengakses layanan disini. Silahkan <a href="#">masuk</a> atau <a href="#">daftar disini</a>.</p>
              </div>
            </li>
            <li>
              <i class="bx bxs-truck"></i>
              <div>
                <h5>Ambil Surat Keterangan Domisili</h5>
                <p>Setelah itu, anda bisa mendapatkan Surat Keterangan Domisili yang telah anda ajukan dengan cara datang ke Kantor Balai Desa Giri Mukti.</p>
              </div>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </section><!-- End Tentang Kami Section -->

  <!-- ======= Kontak Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kontak</h2>
        <h3><span>Kontak Kami</span></h3>
        <p>Jika terdapat kendala, silahkan hubungi kami saat jam kerja atau operasional.</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15954.906749873777!2d116.6843355!3d-1.3403224!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x31bb4102b1052f35!2sBalai%20desa%20Giri%20Mukti!5e0!3m2!1sen!2sid!4v1649619376617!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12">
              <div class="info-box mb-4">
                <i class="bx bx-time"></i>
                <h3>Jam Operasional</h3>
                <p>Senin s/d Kamis : 08:00 - 15:00 WITA</p>
                <p>Jumat : 08:00 - 12:00 WITA</p>
              </div>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-6 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-map"></i>
                <h3>Alamat</h3>
                <p>Jalan Propinsi Km. 15 Girimukti<br>Penajam Paser Utara 76141</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-envelope"></i>
                <h3>Email</h3>
                <p>desagirimukti_kab.ppu@yahoo.com</p>
              </div>
            </div>
          </div>


        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->


@endsection