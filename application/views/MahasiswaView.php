<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <?php $this->load->view('layout') ?>

    <h3>Data Mahasiswa</h3>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        Tambah
    </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Tambah Data Mahasiswa
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <form action="<?= site_url('MahasiswaController/simpan') ?>"
                        method="post">

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NAMA</label>
                            <input type="text" name="nama"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">KELAS</label>
                            <input type="text" name="kelas"
                                class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Mahasiswa -->
    <table class="table table-success table-bordered table-sm mt-3">

        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($mahasiswas as $mahasiswa): ?>

            <tr>
                <td><?= html_escape($mahasiswa->nim) ?></td>
                <td><?= html_escape($mahasiswa->nama) ?></td>
                <td><?= html_escape($mahasiswa->kelas) ?></td>

                <td>

                    <!-- Tombol Edit -->
                    <a href="<?= site_url('MahasiswaController/edit/'.rawurlencode($mahasiswa->nim)) ?>"
                        class="btn btn-success btn-sm">
                        Edit
                    </a>

                    <!-- Tombol Delete -->
                    <form action="<?= site_url('MahasiswaController/hapus/'.rawurlencode($mahasiswa->nim)) ?>"
                        method="post"
                        style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                        <button type="submit"
                            class="btn btn-danger btn-sm">
                            Delete
                        </button>

                    </form>

                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>