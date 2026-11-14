<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <h3>Edit Data Mahasiswa</h3>

    <form action="<?= site_url('MahasiswaController/update/'.rawurlencode($mahasiswa->nim)) ?>"
        method="post">

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" class="form-control"
                value="<?= html_escape($mahasiswa->nim) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">NAMA</label>
            <input type="text" name="nama"
                class="form-control"
                value="<?= html_escape($mahasiswa->nama) ?>"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">KELAS</label>
            <input type="text" name="kelas"
                class="form-control"
                value="<?= html_escape($mahasiswa->kelas) ?>"
                required>
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="<?= site_url('MahasiswaController/getMahasiswas') ?>"
            class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>