@extends('layouts.app')
@section('content')

    <a href="#" onclick="ModalTambahNews()" class="btn btn-success"> + Add New Data</a>

    <table class="table table-bordered">
        <tr>
            <th>News</th>
            <th>Judul</th>
            <th>Link</th>
            <th>Gambar</th>
            <th>Opsi</th>
        </tr>
        @foreach ($webnews as $Get)
            <tr>
                <td>{{ $Get->kd_news }}</td>
                <td>{{ $Get->judul_news }}</td>
                <td>
                <a href="{{ $Get->link_news }}" target="_blank">{{ $Get->link_news }}</a>
            </td>
                <td>
            <a href="{{ $Get->gambar_news }}">
                <img src="{{ $Get->gambar_news }}" alt="News Thumbnail" style="max-width: 200px; max-height: 200px;">
            </a>
        </td>
                <td>
                    <a href="#" onclick="ModalEditNews('{{ $Get->kd_news }}' ,'{{ $Get->judul_news }}')"
                        class="btn btn-info">Update</a>
                    |
                    <a href="#" onclick="ModalHapusNews('{{ $Get->kd_news }}')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        <!-- Form Modal Tambah News -->
        <form action="webnews/tambah" method="post">
            @csrf
            <div class="modal fade" id="ModalTambahNews" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode News</label>
                                <input type="text" class="form-control" name="kd_news" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul News</label>
                                <textarea name="judul_news" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar News</label>
                                <textarea name="gambar_news" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link News</label>
                                <textarea name="link_news" class="form-control" required></textarea>
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
        <!-- Form Modal Tambah News -->

        <!-- Form Modal Hapus News -->
        <form action="webnews/hapus" method="post">
            @csrf
            <div class="modal fade" id="ModalHapusNews" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                        <div class="modal-footer">
                            <input type="hidden" name="kd_news">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Form Modal Hapus News -->

        <!-- Form Modal Edit News -->
        <form action="webnews/edit" method="post">
            @csrf
            <div class="modal fade" id="ModalEditNews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Ubah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode News</label>
                                <input type="text" class="form-control" name="kd_news" id="edit_kd_news" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul News</label>
                                <input type="text" class="form-control" name="judul_news" id="edit_judul_news" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link News</label>
                                <input type="text" class="form-control" name="link_news" id="edit_link_news" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar News</label>
                                <input type="text" class="form-control" name="gambar_news" id="edit_gambar_news" required>
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
        <!-- Form Modal Edit News -->
    </table>

    <script>
        // Modal Tambah News
        function ModalTambahNews() {
            $('#ModalTambahNews').modal('show');
        }

        // Modal Hapus News
        function ModalHapusNews($id) {
            $('[name="kd_news"]').val($id);
            $('#ModalHapusNews').modal('show');
        }

        // Modal Edit News
        function ModalEditNews(id, judul) {
            $('[name="kd_news"]').val(id);
            $('#edit_kd_news').val(id);
            $('#edit_judul_news').val(judul);
            // Anda dapat mengisikan field lainnya di sini dengan cara yang sama
            $('#ModalEditNews').modal('show');
        }
    </script>
@endsection
