@extends('layout.template')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">
                <i class="iconly-Home icli svg-color"></i>
            </a>
        </li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Default</li>
    </ol>
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#f0fdf4',
                    color: '#166534',
                    iconColor: '#16a34a',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#fef2f2',
                    color: '#991b1b',
                    iconColor: '#dc2626',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            @endif
        });
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3 class="mb-2">Zero Configuration</h3>
                        <span>DataTables has most features enabled by default, so all you need to
                            do to use it with your own tables is to call the construction
                            function: <code>$().DataTable();</code>.</span>
                        <span>Searching, ordering and paging goodness will
                            be immediately added to the table, as shown in this example.</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-end">
                            <!-- Tombol Tambah project -->
                            <a href="/tambah/project" class="btn btn-pill btn-primary" title="Tambah project">+Tambah
                                project</a>
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Project</th>
                                        <th>Nama Client</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_project }}</td>
                                            <td>{{ $item->nama_client }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>
                                                <ul class="action">
                                                    {{-- Tombol Detail --}}
                                                    <li class="detail me-2" data-bs-toggle="modal"
                                                        data-bs-target="#modaldetailproject{{ $item->id_project }}">
                                                        <a href="#">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </li>
                                                    {{-- Tombol Edit --}}
                                                    <li class="edit">
                                                        <a href="/edit/{{ $item->id_project }}/project">
                                                            <i class="icon-pencil-alt"></i>
                                                        </a>
                                                    </li>
                                                    {{-- Tombol Hapus --}}
                                                    <li class="delete" data-bs-toggle="modal"
                                                        data-bs-target="#modalhapusproject{{ $item->id_project }}">
                                                        <a href="#">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </td>
                                        </tr>
                                        {{-- Modal Detail Project --}}
                                        <div class="modal fade" id="modaldetailproject{{ $item->id_project }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">Detail Project</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-primary">Data di bawah adalah detail dari project <strong>{{ $item->nama_project }}</strong>.</div>

                                                        {{-- Informasi Umum --}}
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Nama Project</label>
                                                                <input class="form-control" value="{{ $item->nama_project }}" disabled>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Client</label>
                                                                <input class="form-control" value="{{ $item->nama_client }}" disabled>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Tahun</label>
                                                                <input class="form-control" value="{{ $item->tahun }}" disabled>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Kategori</label>
                                                                <input class="form-control" value="{{ $item->kategori->nama_kategori ?? '-' }}" disabled>
                                                            </div>
                                                        </div>

                                                        {{-- Gambar-Gambar dalam Satu Baris (3 kolom) --}}
                                                        <div class="row text-center mt-4">
                                                            <div class="col-md-4 mb-3">
                                                                <strong>Foto Project</strong><br>
                                                                @if ($item->foto_project)
                                                                    <img src="{{ asset($item->foto_project) }}" class="img-thumbnail mt-2" width="100%" alt="Foto Project">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <strong>Foto Pages</strong><br>
                                                                @if ($item->foto_pages)
                                                                    <img src="{{ asset($item->foto_pages) }}" class="img-thumbnail mt-2" width="100%" alt="Foto Pages">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <strong>Foto Dashboard</strong><br>
                                                                @if ($item->foto_dashboard)
                                                                    <img src="{{ asset($item->foto_dashboard) }}" class="img-thumbnail mt-2" width="100%" alt="Foto Dashboard">
                                                                @endif
                                                            </div>
                                                        </div>


                                                        {{-- Deskripsi --}}
                                                        <div class="mb-3 mt-4">
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" disabled rows="4">{{ $item->desk_project }}</textarea>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- modal hapus 2 --}}
                                        <div class="modal fade" id="modalhapusproject{{ $item->id_project }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modalTambahprojectLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="modal-toggle-wrapper">
                                                            <ul class="modal-img text-center">
                                                                <li><img src="{{ asset('admiro/assets/images/gif/danger.gif') }}"
                                                                        alt="gif error"></li>
                                                            </ul>
                                                            <h4 class="text-center pb-2">!Peringatan</h4>
                                                            <div class="modal-body">
                                                                <p class="mt-2 text-center">
                                                                    Apakah anda yakin ingin menghapus project:
                                                                </p>
                                                                <p class="text-center">
                                                                    <span
                                                                        class="d-inline-block text-break bg-success text-white px-2 py-1 rounded">
                                                                        {{ $item->nama_project }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <a href="/hapus/{{ $item->id_project }}/project"
                                                                    class="btn btn-primary" type="button">Ya!
                                                                    Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
