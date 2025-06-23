@extends('page.template.temp')
@section('content')
<!-- About -->
<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="zoom-in">
                <div class="about-me-box shadow-box">
                    <a class="overlay-link" href="/tentang/saya"></a>
                    <img src="{{ asset('pages') }}/assets/images/bg1.png" alt="BG" class="bg-img">
                    <div class="img-box">
                        <img src="{{ asset('pages') }}/assets/images/mearya.png" alt="About Me">
                    </div>
                    <div class="infos">
                        <h4>I'M A PRORAMMER</h4>
                        <h1>A. Aryadi</h1>
                        <p>My dream is to become a cyber security officer</p>
                        <a href="#" class="about-btn">
                            <img src="{{ asset('pages') }}/assets/images/icon.svg" alt="Button">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-credentials-wrap">
                    <div data-aos="zoom-in">
                        <div class="banner shadow-box">
                            <div class="marquee">
                                <div>
                                    <span>SELAMAT DATANG DI <b>PORTOFOLIO ARYA</b> <img
                                            src="{{ asset('pages') }}/assets/images/star1.svg" alt="Star"> SELAMAT DATANG DI
                                        <b>PORTOFOLIO ARYA</b> <img src="{{ asset('pages') }}/assets/images/star1.svg" alt="Star">
                                        SELAMAT DATANG DI
                                        <b>PORTOFOLIO ARYA</b> <img src="{{ asset('pages') }}/assets/images/star1.svg" alt="Star">
                                        SELAMAT DATANG DI
                                        <b>PORTOFOLIO ARYA</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gx-row d-flex gap-24">
                        <div data-aos="zoom-in">
                            <div class="about-crenditials-box info-box shadow-box h-full">
                                <a class="overlay-link" href="/detail"></a>
                                <img src="{{ asset('pages') }}/assets/images/arya1.png" alt="BG" class="bg-img">
                                <img src="{{ asset('pages') }}/assets/images/sign.png" alt="Sign">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="infos">
                                        <h4>more about me</h4>
                                        <h1>Credentials</h1>
                                    </div>
                                    <a href="/detail" class="about-btn">
                                        <img src="{{ asset('pages') }}/assets/images/icon.svg" alt="Button">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="zoom-in">
                            <div class="about-project-box info-box shadow-box h-full">
                                <a class="overlay-link" href="/pekerjaan"></a>
                                <img src="{{ asset('storage/' . $project->foto_pages) }}" alt="BG" class="bg-img">
                                <img src="{{ asset('storage/' . $project->foto_project) }}" alt="My Works">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="infos">
                                        <h4>SHOWCASE</h4>
                                        <h1>Projects</h1>
                                    </div>
                                    <a href="#" class="about-btn">
                                        <img src="{{ asset('pages') }}/assets/images/icon.svg" alt="Button">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-24">
            <div class="col-md-6" data-aos="zoom-in">
                <div class="about-client-box info-box shadow-box">
                    <img src="{{ asset('pages') }}/assets/images/bg1.png" alt="BG" class="bg-img">
                    <div class="clients d-flex align-items-start gap-24 justify-content-center">
                        <div class="client-item">
                            <h1>23</h1>
                            <p>tanggal </p>
                        </div>
                        <div class="client-item">
                            <h1>06</h1>
                            <p>bulan </p>
                        </div>
                        <div class="client-item">
                            <h1>2004</h1>
                            <p>Tahun </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
@endsection
