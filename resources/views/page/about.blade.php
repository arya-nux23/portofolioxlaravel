@extends('page.template.temp')
@section('content')
  <!-- About -->
  <section class="about-area">
    <div class="container">
        <div class="d-flex about-me-wrap align-items-start gap-24">
            <div data-aos="zoom-in">
                <div class="about-image-box shadow-box">
                    <img src="{{ asset('pages') }}/assets/images/bg1.png" alt="BG" class="bg-img">
                    <div class="image-inner">
                        <img src="{{ asset('pages') }}/assets/images/arya1.png" alt="About Me">
                    </div>
                </div>
            </div>

            <div class="about-details" data-aos="zoom-in">
                <h1 class="section-heading" data-aos="fade-up"><img src="{{ asset('pages') }}/assets/images/star-2.png" alt="Star"> my-self <img src="{{ asset('pages') }}/assets/images/star-2.png" alt="Star"></h1>
                <div class="about-details-inner shadow-box">
                    <img src="{{ asset('pages') }}/assets/images/icon2.png" alt="Star">
                    <h1>A. Aryadi</h1>
                    <p>{{ $about->desk_about }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-24">
            <div class="col-md-6" data-aos="zoom-in">
                <div class="about-edc-exp about-experience shadow-box">
                    <img src="{{ asset('pages') }}/assets/images/bg1.png" alt="BG" class="bg-img">
                    <h3>pengalaman</h3>
                    <ul>
                        @foreach ($pengalaman as $item)
                        <li>
                            <p class="date">{{ $item->tahun_masuk }} - {{ $item->tahun_keluar }}</p>
                            <h2>{{ $item->perusahaan }}</h2>
                            <p class="type">{{ $item->bidang_kerja }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6" data-aos="zoom-in">
                <div class="about-edc-exp about-education shadow-box">
                    <img src="{{ asset('pages') }}/assets/images/bg1.png" alt="BG" class="bg-img">
                    <h3>pendidikan</h3>

                    <ul>
                        @foreach ($pendidikan as $item)
                        <li>
                            <p class="date">{{ $item->tahun_masuk }} - {{ $item->tahun_keluar }}</p>
                            <h2>{{ $item->jurusan }}</h2>
                            <p class="type">{{ $item->sekolah }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection
