<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <?php $this->load->view('layout') ?>

    <h3>Data Mata Kuliah</h3>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah">
        Tambah
    </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Tambah Data Mata Kuliah
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <form action="<?= site_url('MataKuliahController/simpan') ?>"
                        method="post">

                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text" name="kode"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SKS</label>
                            <input type="number" name="sks"
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

    <!-- Tabel Mata Kuliah -->
    <table class="table table-success table-bordered table-sm mt-3">

        <thead>
            <tr>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php if (!empty($matakuliahs)): ?>

                <?php foreach ($matakuliahs as $mk): ?>

                <tr>
                    <td><?= html_escape($mk->kode) ?></td>
                    <td><?= html_escape($mk->mata_kuliah) ?></td>
                    <td><?= html_escape($mk->sks) ?></td>

                    <td>

                        <!-- Tombol Edit -->
                        <button class="btn btn-success btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEdit<?= html_escape($mk->kode) ?>">
                            Edit
                        </button>

                        <!-- Tombol Delete -->
                        <form action="<?= site_url('MataKuliahController/hapus/'.rawurlencode($mk->kode)) ?>"
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

            <?php else: ?>
            <?php endif; ?>

        </tbody>
    </table>

    <!-- Modal Edit Mata Kuliah -->
    <?php if (!empty($matakuliahs)): ?>

        <?php foreach ($matakuliahs as $mk): ?>

        <div class="modal fade"
            id="modalEdit<?= html_escape($mk->kode) ?>"
            tabindex="-1">

            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="<?= site_url('MataKuliahController/update') ?>"
                        method="post">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                Edit Mata Kuliah
                            </h5>

                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                            </button>
                        </div>

                        <div class="modal-body">

                            <input type="hidden" name="kode"
                                value="<?= html_escape($mk->kode) ?>">

                            <div class="mb-3">
                                <label class="form-label">Kode</label>
                                <input type="text"
                                    class="form-control"
                                    value="<?= html_escape($mk->kode) ?>"
                                    disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mata Kuliah</label>
                                <input type="text"
                                    name="mata_kuliah"
                                    class="form-control"
                                    value="<?= html_escape($mk->mata_kuliah) ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">SKS</label>
                                <input type="number"
                                    name="sks"
                                    class="form-control"
                                    value="<?= html_escape($mk->sks) ?>"
                                    required>
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="submit"
                                class="btn btn-primary">
                                Simpan Perubahan
                            </button>

                            <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Batal
                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>