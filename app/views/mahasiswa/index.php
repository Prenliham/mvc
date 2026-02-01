<div class="container">
    <div class="mt-4">
        <div class="d-grid">
            <div class="d-grid">
                <?= Flasher::flash() ?>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <h3>Daftar Mahasiswa</h3>
            <button type="button" class="btn btn-primary btnModalTambah" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
        <ul class="list-group mt-4">
            <?php foreach ($data['mhs'] as $mahasiswa) :?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $mahasiswa['nama'] ?> 
                    <div class="d-flex align-items-center">
                        <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mahasiswa["id"] ?>" class="badge badge-primary align-center">Detail</a>
                        <a href="<?= BASEURL ?>/mahasiswa/edit/<?= $mahasiswa["id"] ?>"  class="badge badge-warning align-center ml-2 btnModalUbah" data-toggle="modal" data-id="<?= $mahasiswa['id']; ?>" data-target="#formModal">Edit</a>
                        <a href="<?= BASEURL ?>/mahasiswa/delete/<?= $mahasiswa["id"] ?>" onclick="return confirm('yakin ingin hapus data?')"  class="badge badge-danger align-center ml-2">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= BASEURL ?>/mahasiswa/tambah" method="POST">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="text" class="form-control" id="nrp" placeholder="Masukkan NRP" name="nrp">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <option value="sistem informasi">Sistem Informasi</option>
                        <option value="teknik informatika">Teknik Informatika</option>
                        <option value="hukum">Hukum</option>
                        <option value="sastra inggris">Sastra Inggris</option>
                        <option value="ilmu komunikasi">Ilmu Komunikasi</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>