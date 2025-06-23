@extends('page.template.temp')
@section('content')
    <!-- Credentials -->
    <section class="credential-area">
        <div class="container">
            <div class="gx-row d-flex">
                <div class="credential-sidebar-wrap" data-aos="zoom-in">
                    <div class="credential-sidebar text-center">
                        <div class="shadow-box">
                            <img src="{{ asset('pages') }}/assets/images/arya1.png" alt="BG" class="bg-img">
                            <div class="img-box">
                                <img src="{{ asset('pages') }}/assets/images/arya1.png" alt="About Me">
                            </div>
                            <h2>A. Aryadi</h2>
                            <p>@ar_dmz25</p>
                            <ul class="social-links d-flex justify-content-center">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/ar_dmz25?igsh=MW5pbGEwZmFoamY0bw=="><i
                                            class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="contact.html" class="theme-btn">Contact Me</a>
                        </div>
                    </div>
                </div>

                <div class="credential-content flex-1">
                    <div class="credential-about" data-aos="zoom-in">
                        <h2>About Me</h2>
                        <p>{{ $about->desk_about }}</p>
                    </div>
                    <div class="credential-edc-exp credential-experience">
                        <h2 data-aos="fade-up">pengalaman</h2>
                        @foreach ($pengalaman as $item)
                            <div class="credential-edc-exp-item" data-aos="zoom-in">
                                <h4>{{ $item->tahun_masuk }} - {{ $item->tahun_keluar }}</h4>
                                <h3>{{ $item->perusahaan }}</h3>
                                <h5>{{ $item->bidang_kerja }}</h5>
                                <p>{{ $item->desk_pengalaman }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="credential-edc-exp credential-education">
                        <h2 data-aos="fade-up">pendidikan</h2>
                        @foreach ($pendidikan as $item)
                            <div class="credential-edc-exp-item" data-aos="zoom-in">
                                <h4>{{ $item->tahun_masuk }} - {{ $item->tahun_keluar }}</h4>
                                <h3>{{ $item->jurusan }}</h3>
                                <h5>{{ $item->sekolah }}</h5>
                                <p>{{ $item->desk_pendidikan }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="skills-wrap">
                        <h2 data-aos="fade-up">Skills</h2>
                        @php
                            $left = [];
                            $right = [];

                            foreach ($skil as $index => $item) {
                                if ($index % 2 == 0) {
                                    $left[] = $item;
                                } else {
                                    $right[] = $item;
                                }
                            }
                        @endphp
                        <div class="d-flex flex-row">
                            <!-- Kolom Kiri -->
                            <div class="d-flex flex-column gap-3" style="flex: 1;">
                                @foreach ($left as $item)
                                    <div class="skill-item" data-aos="zoom-in">
                                        <span class="percent">{{ $item->tingkat_skil }}</span>
                                        <h3 class="name">{{ $item->nama_skil }}</h3>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Kolom Kanan -->
                            <div class="d-flex flex-column gap-3" style="flex: 1; margin-left: 100px;">
                                @foreach ($right as $item)
                                    <div class="skill-item" data-aos="zoom-in">
                                        <span class="percent">{{ $item->tingkat_skil }}</span>
                                        <h3 class="name">{{ $item->nama_skil }}</h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
