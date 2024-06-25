@extends('layouts.app')
@section('content')

    <a href="#" onclick="ModalTambahProfile()" class="btn btn-success"> + Add New Data</a>

    <table class="table table-bordered">
        <tr>
            <th>Profile</th>
            <th>Link</th>
            <th>Gambar</th>
            <th>Opsi</th>
        </tr>
        @foreach ($webprofile as $profile)
            <tr>
                <td>{{ $profile->kd_profile }}</td>
                <td>{{ $profile->link_profile }}</td>
                <td>
            <a href="{{ $profile->gambar_profile }}">
                <img src="{{ $profile->gambar_profile }}" alt="profile Thumbnail" style="max-width: 200px; max-height: 200px;">
            </a>
        </td>
                <td>
                    <a href="#" onclick="ModalEditProfile('{{ $profile->kd_profile }}' ,'{{ $profile->link_profile }}')"
                        class="btn btn-info">Update</a>
                    |
                    <a href="#" onclick="ModalHapusProfile('{{ $profile->kd_profile }}')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        <!-- Form Modal Tambah Profile -->
        <form action="webprofile/tambah" method="post">
            @csrf
            <div class="modal fade" id="ModalTambahProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Profile</label>
                                <input type="text" class="form-control" name="kd_profile" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Gambar Profile</label>
                                <textarea name="gambar_profile" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link Profile</label>
                                <textarea name="link_profile" class="form-control" required></textarea>
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
        <!-- Form Modal Tambah Profile -->

        <!-- Form Modal Hapus Profile -->
        <form action="webprofile/hapus" method="post">
            @csrf
            <div class="modal fade" id="ModalHapusProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                        <div class="modal-footer">
                            <input type="hidden" name="kd_profile">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Form Modal Hapus Profile -->

        <!-- Form Modal Edit Profile -->
        <form action="webprofile/edit" method="post">
            @csrf
            <div class="modal fade" id="ModalEditProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Ubah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Profile</label>
                                <input type="text" class="form-control" name="kd_profile" id="edit_kd_profile" required>
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label">Link Profile</label>
                                <input type="text" class="form-control" name="link_profile" id="edit_link_profile" required>
                            </div>
                            <div class="mb-3">
                        <label class="form-label">Gambar Profile</label>
                        <input type="text" class="form-control" name="gambar_profile" id="edit_gambar_profile" required>
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
            function ModalTambahProfile () {
           $('#ModalTambahProfile').modal('show');
       }
            // Modal Tambah videos


            // Modal Hapus Videos
            function ModalHapusProfile($id) {
                $('[name="kd_profile"]').val($id);
                $('#ModalHapusProfile').modal('show');
            }
            // Modal Tambah Videos


            // Modal Edit Berita
            // Modal Edit Berita
    function ModalEditProfile(id, judul) {
        $('[name="kd_profile"]').val(id);
        $('#edit_kd_profile').val(id);
        $('#edit_judul_profile').val(judul);
        // You can populate other fields here similarly
        $('#ModalEditProfile').modal('show');
    }
            // Modal Edit Berita
        </script>


@endsection