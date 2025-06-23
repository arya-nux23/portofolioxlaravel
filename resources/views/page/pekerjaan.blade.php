@extends('page.template.temp')
@section('content')
<section class="projects-area">
    <style>
        .project-img-fixed {
            width: 339px;
            height: 287px;
            object-fit: cover;
            max-width: 100%;
            display: block;
            margin: 0 auto;
        }
        .project-info p {
            margin: 0;
            font-size: 14px;
            color: #888;
        }
        .project-info h1 {
            margin: 0;
            font-size: 20px;
        }
    </style>
    <div class="container">
        <div class="row">
            @foreach ($project as $item)
            <div class="col-md-4 mb-4">
                <div data-aos="zoom-in">
                    <div class="project-item shadow-box">
                        <a class="overlay-link" href="/detail/{{ $item->id_project }}/project"></a>
                        <!-- Gambar ukuran 339x287 -->
                        <div class="project-img">
                            <img src="{{ asset('storage/' . $item->foto_project) }}" alt="Project" class="project-img-fixed">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div class="project-info">
                                <p>{{ $item->kategori->nama_kategori }}</p>
                                <h1>{{ $item->nama_project }}</h1>
                            </div>
                            <a href="/detail/{{ $item->id_project }}/project" class="project-btn">
                                <img src="{{ asset('pages') }}/assets/images/icon.svg" alt="Button">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
