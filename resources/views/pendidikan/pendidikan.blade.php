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
                title: '{{ session("success") }}',
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
                            <!-- Tombol Tambah pendidikan -->
                            <button class="btn btn-pill btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModalgetbootstrap" title="Tambah pendidikan">+Tambah
                                pendidikan</button>
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jurusan</th>
                                        <th>Sekolah</th>
                                        <th>Tahun Masuk</th>
                                        <th>Tahun Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendidikan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->sekolah }}</td>
                                            <td>{{ $item->tahun_masuk }}</td>
                                            <td>{{ $item->tahun_keluar }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalgetbootstrap{{ $item->id_pendidikan }}">
                                                        <a href="#"><i class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete" data-bs-toggle="modal"
                                                        data-bs-target="#modalhapuspendidikan{{ $item->id_pendidikan }}"><a
                                                            href="#"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        {{-- modal hapus 2 --}}
                                        <div class="modal fade" id="modalhapuspendidikan{{ $item->id_pendidikan }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modalTambahpendidikanLabel"
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
                                                                    Apakah anda yakin ingin menghapus pendidikan:
                                                                </p>
                                                                <p class="text-center">
                                                                    <span
                                                                        class="d-inline-block text-break bg-success text-white px-2 py-1 rounded">
                                                                        {{ $item->jurusan }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <a href="/hapus/{{ $item->id_pendidikan }}/pendidikan"
                                                                    class="btn btn-primary" type="button">Ya!
                                                                    Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- modal edit --}}
                                        <div class="modal fade" id="exampleModalgetbootstrap{{ $item->id_pendidikan }}"
                                            tabindex="-1" aria-labelledby="exampleModalgetbootstrap" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title mx-auto">Tambah Data pendidikan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="/edit/{{ $item->id_pendidikan }}/pendidikan"
                                                        method="POST" class="needs-validation" novalidate>
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <label for="validationCustom01"
                                                                        class="form-label">Jurusan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom01" name="jurusan"
                                                                        value="{{ $item->jurusan }}"
                                                                        placeholder="Masukkan Nama jurusan..." required>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="validationCustom02"
                                                                        class="form-label">sekolah</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom02" name="sekolah"
                                                                        value="{{ $item->sekolah }}"
                                                                        placeholder="Masukkan Nama sekolah..." required>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="validationCustom01"
                                                                        class="form-label">Tahun Masuk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom01" name="tahun_masuk"
                                                                        value="{{ $item->tahun_masuk }}"
                                                                        placeholder="Masukkan Tahun Masuk..." required>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="validationCustom02"
                                                                        class="form-label">Tahun Keluar</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationCustom02" name="tahun_keluar"
                                                                        value="{{ $item->tahun_keluar }}"
                                                                        placeholder="Masukkan Tahun Keluar..." required>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="exampleFormControlTextarea1"
                                                                        class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"
                                                                        placeholder="Masukkan Description..." required>{{ $item->desk_pendidikan }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer justify-content-end">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
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
    {{-- modal tambah --}}
    <div class="modal fade" id="exampleModalgetbootstrap" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalgetbootstrap" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                    <h3 class="modal-header justify-content-center border-0">Tambah Data pendidikan</h3>
                    <div class="modal-body">
                        <form action="/tambah/pendidikan" method="POST" class="row g-3 needs-validation"
                            novalidate="">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Jurusan</label>
                                <input class="form-control" id="validationCustom01" type="text" name="jurusan"
                                    placeholder="Masukkan Jurusan...." required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom02">sekolah</label>
                                <input class="form-control" id="validationCustom02" type="text" name="sekolah"
                                    placeholder="Masukkan sekolah pendidikan...." required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Tahun Masuk</label>
                                <input class="form-control" id="validationCustom01" type="text" name="tahun_masuk"
                                    placeholder="Masukkan Tahun Masuk...." required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom02">Tahun Keluar</label>
                                <input class="form-control" id="validationCustom02" type="text" name="tahun_keluar"
                                    placeholder="Masukkan Tahun Keluar pendidikan...." required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Masukan Description...."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
