@extends('layouts.app')
@section('content')

    <a href="#" onclick="ModalTambahTrik()" class="btn btn-success"> + Add New Data</a>

    <table class="table table-bordered">
        <tr>
            <th>Trik</th>
            <th>Judul</th>
            <th>Link</th>
            <th>Gambar</th>
            <th>Opsi</th>
        </tr>
        @foreach ($webtrik as $Get)
            <tr>
                <td>{{ $Get->kd_trik }}</td>
                <td>{{ $Get->judul_trik }}</td>
                <td>
                <a href="{{ $Get->link_trik }}" target="_blank">{{ $Get->link_trik }}</a>
            </td>
                <td>
            <a href="{{ $Get->gambar_trik }}">
                <img src="{{ $Get->gambar_trik }}" alt="Trik Thumbnail" style="max-width: 200px; max-height: 200px;">
            </a>
        </td>
                <td>
                    <a href="#" onclick="ModalEditTrik('{{ $Get->kd_trik }}' ,'{{ $Get->judul_trik }}')"
                        class="btn btn-info">Update</a>
                    |
                    <a href="#" onclick="ModalHapusTrik('{{ $Get->kd_trik }}')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        <!-- Form Modal Tambah Trik -->
        <form action="webtrik/tambah" method="post">
            @csrf
            <div class="modal fade" id="ModalTambahTrik" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Trik</label>
                                <input type="text" class="form-control" name="kd_trik" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul Trik</label>
                                <textarea name="judul_trik" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar Trik</label>
                                <textarea name="gambar_trik" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link Trik</label>
                                <textarea name="link_trik" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Form Modal Tambah Trik -->

        <!-- Form Modal Hapus Trik -->
        <form action="webtrik/hapus" method="post">
            @csrf
            <div class="modal fade" id="ModalHapusTrik" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                        <div class="modal-footer">
                            <input type="hidden" name="kd_trik">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Form Modal Hapus Trik -->

        <!-- Form Modal Edit Trik -->
        <form action="webtrik/edit" method="post">
            @csrf
            <div class="modal fade" id="ModalEditTrik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Ubah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Trik</label>
                                <input type="text" class="form-control" name="kd_trik" id="edit_kd_trik" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul Trik</label>
                                <input type="text" class="form-control" name="judul_trik" id="edit_judul_trik" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link Trik</label>
                                <input type="text" class="form-control" name="link_trik" id="edit_link_trik" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar Trik</label>
                                <input type="text" class="form-control" name="gambar_trik" id="edit_gambar_trik" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Form Modal Edit Trik -->
    </table>

    <script>
        // Modal Tambah Trik
        function ModalTambahTrik() {
            $('#ModalTambahTrik').modal('show');
        }

        // Modal Hapus Trik
        function ModalHapusTrik($id) {
            $('[name="kd_trik"]').val($id);
            $('#ModalHapusTrik').modal('show');
        }

        // Modal Edit Trik
        function ModalEditTrik(id, judul) {
            $('[name="kd_trik"]').val(id);
            $('#edit_kd_trik').val(id);
            $('#edit_judul_trik').val(judul);
            // Anda dapat mengisikan field lainnya di sini dengan cara yang sama
            $('#ModalEditTrik').modal('show');
        }
    </script>
@endsection
