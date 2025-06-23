@extends('page.template.temp')
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content" data-aos="fade-up">
            <p>BRANDING - {{ $project->nama_project }}</p>
            <h1 class="section-heading"><img src="{{ asset('pages') }}/assets/images/star-2.png" alt="Star">project saya<img src="{{ asset('pages') }}/assets/images/star-2.png" alt="Star"></h1>
        </div>
    </div>
</section>

<!-- Project Details -->
<section class="project-details-wrap">
    <div class="project-details-img" data-aos="zoom-in">
        <img src="{{ asset('storage/' . $project->foto_project) }}" alt="Project Details" class="img-fluid w-100" style="max-height: 551px; object-fit: cover;">
    </div>

    <div class="container">
        <div data-aos="zoom-in">
            <div class="project-about-2 d-flex shadow-box mb-24">
                <img src="{{ asset('pages') }}/assets/images/bg1.png" alt="BG" class="bg-img">
                <div class="left-details">
                    <img src="{{ asset('pages') }}/assets/images/icon3.png" alt="Icon">
                    <ul>
                        <li>
                            <p>Year</p>
                            <h4>{{ $project->tahun }}</h4>
                        </li>
                        <li>
                            <p>Client</p>
                            <h4>{{ $project->nama_client }}</h4>
                        </li>
                        <li>
                            <p>Project</p>
                            <h4>{{ $project->kategori->nama_kategori }}</h4>
                        </li>
                        <li>
                            <p>Title</p>
                            <h4>{{ $project->nama_project }}</h4>
                        </li>
                    </ul>
                </div>
                <div class="right-details">
                    <h3>Description</h3>
                    <p>{{ $project->desk_project }}</p>
                </div>
            </div>
        </div>
        <div class="row mb-24">
            <div class="col-md-6" data-aos="zoom-in">
                <div class="project-details-3-img">
                    <img src="{{ asset('storage/' . $project->foto_pages) }}"
                         alt="Project"
                         class="img-fluid"
                         style="width: 568px; height: 488px; object-fit: cover; border-radius: 8px;">
                </div>
            </div>
            <div class="col-md-6" data-aos="zoom-in">
                <div class="project-details-3-img">
                    <img src="{{ asset('storage/' . $project->foto_dashboard) }}"
                         alt="Project"
                         class="img-fluid"
                         style="width: 568px; height: 488px; object-fit: cover; border-radius: 8px;">
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
