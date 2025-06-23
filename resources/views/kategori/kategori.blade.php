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
<!-- SweetAlert2 CDN -->
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

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session("error") }}',
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
                            <!-- Tombol Tambah Kategori -->
                            <button class="btn btn-pill btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalTambahKategori" title="Tambah Kategori">+Tambah Kategori</button>
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>
                                                <ul class="action d-flex gap-2 list-unstyled m-0 p-0">
                                                    <li class="edit" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditKategori{{ $item->id_kategori }}"><a
                                                            href="#"><i class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete" data-bs-toggle="modal"
                                                        data-bs-target="#modalHapusKategori{{ $item->id_kategori }}"><a
                                                            href="#"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        {{-- MODAL HAPUS KATEGORI --}}
                                        <div class="modal fade" id="modalHapusKategori{{ $item->id_kategori }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modalHapusKategoriLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="modal-toggle-wrapper">
                                                            <ul class="modal-img text-center">
                                                                <li>
                                                                    <img src="{{ asset('admiro/assets/images/gif/danger.gif') }}"
                                                                        alt="gif error">
                                                                </li>
                                                            </ul>
                                                            <h4 class="text-center pb-2">!Peringatan</h4>
                                                            <div class="modal-body">
                                                                <p class="mt-2 text-center">
                                                                    Apakah anda yakin ingin menghapus Kategori:
                                                                </p>
                                                                <p class="text-center">
                                                                    <span
                                                                        class="d-inline-block text-break bg-success text-white px-2 py-1 rounded">
                                                                        {{ $item->nama_kategori }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <a href="/hapus/{{ $item->id_kategori }}/kategori"
                                                                    class="btn btn-primary" type="button">Ya! Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- MODAL Edit KATEGORI -->
                                        <div class="modal fade" id="modalEditKategori{{ $item->id_kategori }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modalEditKategoriLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="modal-toggle-wrapper">
                                                            <h4 class="text-center pb-2">Edit Kategori Baru</h4>
                                                            <form action="/edit/{{ $item->id_kategori }}/kategori"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="nama_kategori" class="form-label">Nama
                                                                        Kategori</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_kategori" name="kategori" required
                                                                        value="{{ old('kategori', $item->nama_kategori) }}"
                                                                        placeholder="Masukkan Nama Kategori">
                                                                </div>
                                                                <div class="d-flex justify-content-center gap-2">

                                                                    <button class="btn btn-secondary" type="button"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
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

    <!-- MODAL TAMBAH KATEGORI -->
    <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog"
        aria-labelledby="modalTambahKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <h4 class="text-center pb-2">Tambah Kategori Baru</h4>
                        <form action="/kategori-tambah" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="kategori" required
                                    placeholder="Masukkan Nama Kategori">
                            </div>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
