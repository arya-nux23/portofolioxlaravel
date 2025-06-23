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
                        <code>.{valid|invalid}</code>-feedback classes for</p>
                </div>
                <div class="card-body">
                    <form action="/tambah/project" method="POST" enctype="multipart/form-data"
                        class="row g-3 needs-validation custom-input tooltip-valid validation-forms" novalidate>
                        @csrf
                        <div class="col-md-3 position-relative">
                            <label class="form-label" for="validationTooltip01">Nama Project</label>
                            <input class="form-control" name="nama" id="validationTooltip01" type="text"
                                placeholder="Masukkan nama project" required>
                            <div class="valid-tooltip">Looks good!</div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label" for="validationTooltip02">Nama Client</label>
                            <input class="form-control" name="client" id="validationTooltip02" type="text"
                                placeholder="Masukkan nama Client" required>
                            <div class="valid-tooltip">Looks good!</div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label" for="validationTooltip03">Tahun</label>
                            <input class="form-control" name="tahun" id="validationTooltip03" type="text"
                                placeholder="Masukkan tahun" required>
                            <div class="valid-tooltip">Looks good!</div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label" for="validationTooltip04">Kategori</label>
                            <select class="form-select" id="validationTooltip04" name="id_kategori" required>
                                <option selected disabled value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <div class="valid-tooltip">Looks good!</div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label class="form-label" for="foto_project">Upload Gambar Project</label>
                            <div class="input-group has-validation">
                                <input class="form-control" name="foto_project" id="foto_project"
                                    type="file" required>
                                <div class="invalid-tooltip">Please choose a valid Project image.</div>
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label class="form-label" for="foto_pages">Upload Gambar Halaman</label>
                            <div class="input-group has-validation">
                                <input class="form-control" name="foto_pages" id="foto_pages"
                                    type="file" required>
                                <div class="invalid-tooltip">Please choose a valid Project image.</div>
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label class="form-label" for="foto_dashboard">Upload Gambar Dashboard</label>
                            <div class="input-group has-validation">
                                <input class="form-control" name="foto_dashboard" id="foto_dashboard"
                                    type="file" required>
                                <div class="invalid-tooltip">Please choose a valid Project image.</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="desk" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">+ Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
