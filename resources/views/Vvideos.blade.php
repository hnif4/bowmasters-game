@extends('layouts.app')
@section('content')



<a href="#" onclick="ModalTambahVideos()" class="btn btn-success"> + Add New Data</a>


<table class="table table-bordered">
    <tr>
        <th>Videos</th>
        <th>Judul</th>
        <th>Link</th>
        <th>Gambar</th>
        <th>Opsi</th>
    </tr>
    @foreach ($webvideos as $Get)
    <tr>
        <td>{{ $Get->kd_videos }}</td>
        <td>{{ $Get->judul_videos }}</td>
        <td>
                <a href="{{ $Get->link_videos }}" target="_blank">{{ $Get->link_videos }}</a>
            </td>
        <td>
            <a href="{{ $Get->gambar_videos }}">
                <img src="{{ $Get->gambar_videos }}" alt="Video Thumbnail" style="max-width: 200px; max-height: 200px;">
            </a>
        </td>

        <td>
            <a href="#" onclick="ModalEditVideos('{{ $Get->kd_videos }}' ,'{{ $Get->judul_videos }}')" class="btn btn-info">Update</a>
            |
            <a href="#" onclick="ModalHapusVideos('{{ $Get->kd_videos }}')" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach


    <!-- Form Modal Tambah videos -->
    <!-- Form Modal Tambah Berita -->
    <form action="webvideos/tambah" method="post">
        @csrf
        <div class="modal fade" id="ModalTambahVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Tambah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Kode Videos</label>
                            <input type="text" class="form-control" name="kd_videos" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Videos</label>
                            <textarea name="judul_videos" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">gambar Videos</label>
                            <textarea name="gambar_videos" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link Videos</label>
                            <textarea name="link_videos" class="form-control" required></textarea>
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
    <!-- Form Modal Tambah Berita -->

    <!-- Form Modal Hapus Videos-->
    <form action="webvideos/hapus" method="post">
        @csrf
        <div class="modal fade" id="ModalHapusVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-footer">
                        <input type="hidden" name="kd_videos">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Form Modal Hapus Videos-->


    <!-- Form Modal Edit Berita -->
    <form action="webvideos/edit" method="post">
        @csrf
        <div class="modal fade" id="ModalEditVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Ubah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Videos</label>
                            <input type="text" class="form-control" name="kd_videos" id="edit_kd_videos" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Videos</label>
                            <input type="text" class="form-control" name="judul_videos" id="edit_judul_videos" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link Videos</label>
                            <input type="text" class="form-control" name="link_videos" id="edit_link_videos" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Videos</label>
                            <input type="text" class="form-control" name="gambar_videos" id="edit_gambar_videos" required>
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
</table>
<!-- Form Modal Edit Berita -->

<!-- Form Modal Edit Berita -->

<script>
    // Modal Tambah Videos
    function ModalTambahVideos() {
        $('#ModalTambahVideos').modal('show');
    }
    // Modal Tambah videos


    // Modal Hapus Videos
    function ModalHapusVideos($id) {
        $('[name="kd_videos"]').val($id);
        $('#ModalHapusVideos').modal('show');
    }
    // Modal Tambah Videos


    // Modal Edit Berita
    // Modal Edit Berita
    function ModalEditVideos(id, judul) {
        $('[name="kd_videos"]').val(id);
        $('#edit_kd_videos').val(id);
        $('#edit_judul_videos').val(judul);
        // You can populate other fields here similarly
        $('#ModalEditVideos').modal('show');
    }
    // Modal Edit Berita
</script>
@endsection