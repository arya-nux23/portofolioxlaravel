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
                            <!-- Tombol Tambah skil -->
                            <button class="btn btn-pill btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalTambahskil" title="Tambah skil">+Tambah skil</button>
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Tingkat Skills</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skill as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_skil }}</td>
                                            <td>{{ $item->tingkat_skil }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditskil{{ $item->id_skil }}"><a
                                                            href="#"><i class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete" data-bs-toggle="modal"
                                                        data-bs-target="#modalHapusSkil{{ $item->id_skil }}"><a
                                                            href="#"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        {{-- MODAL HAPUS --}}
                                        <div class="modal fade" id="modalHapusSkil{{ $item->id_skil }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalHapusSkilLabel" aria-hidden="true">
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
                                                                    Apakah anda yakin ingin menghapus Skil:
                                                                </p>
                                                                <p class="text-center">
                                                                    <span
                                                                        class="d-inline-block text-break bg-success text-white px-2 py-1 rounded">
                                                                        {{ $item->nama_skil }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <a href="/hapus/{{ $item->id_skil }}/skil"
                                                                    class="btn btn-primary" type="button">Ya! Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- MODAL Edit skil -->
                                        <div class="modal fade" id="modalEditskil{{ $item->id_skil }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalEditskilLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="modal-toggle-wrapper">
                                                            <h4 class="text-center pb-2">Edit skil Baru</h4>
                                                            <form action="/edit/{{ $item->id_skil }}/skil" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="nama_skil" class="form-label">Nama
                                                                        skil</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_skil" name="skil" required
                                                                        value="{{ old('skil', $item->nama_skil) }}"
                                                                        placeholder="Masukkan Nama skil">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tingkat_skil" class="form-label">Tingkat
                                                                        Skil</label>
                                                                    <input type="text" class="form-control"
                                                                        id="tingkat_skil" name="tingkat_skil" required
                                                                        value="{{ old('skil', $item->tingkat_skil) }}"
                                                                        placeholder="Masukkan Nama skil">
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

    <!-- MODAL TAMBAH skil -->
    <div class="modal fade" id="modalTambahskil" tabindex="-1" role="dialog" aria-labelledby="modalTambahskilLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <h4 class="text-center pb-2">Tambah skil Baru</h4>
                        <form action="/skil-tambah" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_skil" class="form-label">Nama skil</label>
                                <input type="text" class="form-control" id="nama_skil" name="skil" required
                                    placeholder="Masukkan Nama skil">
                            </div>
                            <div class="mb-3">
                                <label for="tingkat_skil" class="form-label">Tingkat skil</label>
                                <input type="text" class="form-control" id="tingkat_skil" name="tingkat_skil"
                                    required placeholder="Masukkan Nama skil">
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
