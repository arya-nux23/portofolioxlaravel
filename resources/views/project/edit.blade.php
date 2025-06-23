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
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <h3>Form tambah project</h3>
                        <p class="mt-1 mb-0">
                            If your form layout allows it, you can swap the
                            <code>.{valid|invalid}</code>-feedback classes for
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="/edit/{{ $project->id_project }}/project" method="POST" enctype="multipart/form-data"
                            class="row g-3 needs-validation custom-input tooltip-valid validation-forms" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltipNama">Nama Project</label>
                                    <input class="form-control" name="nama" id="validationTooltipNama" type="text"
                                        placeholder="Masukkan nama project" value="{{ $project->nama_project }}" required>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltipClient">Nama Client</label>
                                    <input class="form-control" name="client" id="validationTooltipClient" type="text"
                                        placeholder="Masukkan nama Client" value="{{ $project->nama_client }}" required>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltipTahun">Tahun</label>
                                    <input class="form-control" value="{{ $project->tahun }}" name="tahun"
                                        id="validationTooltipTahun" type="text" placeholder="Masukkan tahun" required>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltipKategori">Kategori</label>
                                    <select class="form-select" id="validationTooltipKategori" name="id_kategori" required>
                                        <option selected disabled value="">Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id_kategori }}"
                                                {{ old('id_kategori', $project->id_kategori) == $item->id_kategori ? 'selected' : '' }}>
                                                {{ $item->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>

                            <div class="col-md-4 position-relative">
                                <label class="form-label" for="foto_project">Upload Gambar Project</label>
                                <div class="input-group has-validation">
                                    <input class="form-control" name="foto_project" id="foto_project" type="file"
                                        placeholder="Masukkan gambar">
                                    <div class="invalid-tooltip">Please choose a valid Project image.</div>
                                </div>
                                @if (!empty($project->foto_project))
                                    <div class="mt-2">
                                        <!-- Trigger Gambar -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFotoProject">
                                            <img src="{{ asset('storage/' . $project->foto_project) }}" alt="Foto Project"
                                                width="100" style="cursor: pointer;">
                                        </a>
                                        <small class="text-muted d-block">Gambar saat ini</small>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalFotoProject" tabindex="-1"
                                        aria-labelledby="modalFotoProjectLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalFotoProjectLabel">Foto Project</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/' . $project->foto_project) }}"
                                                        alt="Foto Project" class="img-fluid rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 position-relative">
                                <label class="form-label" for="foto_pages">Upload Gambar Halaman</label>
                                <div class="input-group has-validation">
                                    <input class="form-control" name="foto_pages" id="foto_pages" type="file"
                                        placeholder="Masukkan gambar">
                                    <div class="invalid-tooltip">Please choose a valid Project image.</div>
                                </div>
                                {{-- Foto Pages --}}
                                @if (!empty($project->foto_pages))
                                    <div class="mt-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFotoPages">
                                            <img src="{{ asset('storage/' . $project->foto_pages) }}" alt="Foto Pages"
                                                width="100" style="cursor: pointer;">
                                        </a>
                                        <small class="text-muted d-block">Gambar saat ini</small>
                                    </div>

                                    <!-- Modal Foto Pages -->
                                    <div class="modal fade" id="modalFotoPages" tabindex="-1"
                                        aria-labelledby="modalFotoPagesLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalFotoPagesLabel">Foto Pages</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/' . $project->foto_pages) }}"
                                                        alt="Foto Pages" class="img-fluid rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 position-relative">
                                <label class="form-label" for="foto_dashboard">Upload Gambar Dashboard</label>
                                <div class="input-group has-validation">
                                    <input class="form-control" name="foto_dashboard" id="foto_dashboard" type="file"
                                        placeholder="Masukkan gambar">
                                    <div class="invalid-tooltip">Please choose a valid Project image.</div>
                                </div>
                                {{-- Foto Dashboard --}}
                                @if (!empty($project->foto_dashboard))
                                    <div class="mt-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFotoDashboard">
                                            <img src="{{ asset('storage/' . $project->foto_dashboard) }}"
                                                alt="Foto Dashboard" width="100" style="cursor: pointer;">
                                        </a>
                                        <small class="text-muted d-block">Gambar saat ini</small>
                                    </div>

                                    <!-- Modal Foto Dashboard -->
                                    <div class="modal fade" id="modalFotoDashboard" tabindex="-1"
                                        aria-labelledby="modalFotoDashboardLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalFotoDashboardLabel">Foto Dashboard
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/' . $project->foto_dashboard) }}"
                                                        alt="Foto Dashboard" class="img-fluid rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="desk" id="exampleFormControlTextarea1" rows="3" required>{{ $project->desk_project }}</textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">+ Tambah</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
