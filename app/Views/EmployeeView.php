<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">👨‍💼 Daftar Employee</h2>

        <!-- Form Tambah / Edit -->
        <?php
        $isEdit = isset($employee['id_employee']);
        $formAction = $isEdit
            ? base_url('employee/update/' . $employee['id_employee'])
            : base_url('employee/store');
        ?>
        <div class="card mb-4 shadow">
            <div class="card-header bg-<?= $isEdit ? 'warning' : 'primary' ?> text-white">
                <?= $isEdit ? '✏️ Edit Employee' : '➕ Tambah Employee' ?>
            </div>

            <div class="card-body">
                <form method="post" action="<?= $formAction ?>">

                    <div class="mb-3">
                        <label for="nama_employee" class="form-label">Nama Employee</label>
                        <input type="text" name="nama_employee" class="form-control" placeholder="Nama Employee" value="<?= $isEdit ? esc($employee['nama_employee']) : '' ?>" required>
                    </div>
                    <div class="col">
                        <select name="id_role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="1" <?= $isEdit && $employee['id_role'] == 1 ? 'selected' : '' ?>>1 - Konsultan</option>
                            <option value="2" <?= $isEdit && $employee['id_role'] == 2 ? 'selected' : '' ?>>2 - Technical Writer</option>
                        </select>
                    </div>


            </div>
            <div class="mb-3">
                <label for="alamat_employee" class="form-label">Alamat Employee</label>
                <input type="text" name="alamat_employee" class="form-control" value="<?= $isEdit ? esc($employee['alamat_employee']) : '' ?>" required>
            </div>
            <div class="col">
                <input type="date" name="dob_employee" class="form-control" value="<?= $isEdit ? esc($employee['dob_employee']) : '' ?>" required>
            </div>

        </div>
        <div class="mb-3">
            <label for="status_employee" class="form-label">Status Employee</label>
            <input type="text" name="status_employee" class="form-control" placeholder="Status" value="<?= $isEdit ? esc($employee['status_employee']) : '' ?>" required>
        </div>
        <div class="col">
            <label for="nohp_employee" class="form-label">Nomor HP Employee</label>
            <input type="text" name="nohp_employee" class="form-control" value="<?= $isEdit ? esc($employee['nohp_employee']) : '' ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?= $isEdit ? esc($employee['username']) : '' ?>" required>
        </div>
        <div class="col">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?= $isEdit ? esc($employee['password']) : '' ?>" required>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-<?= $isEdit ? 'warning' : 'primary' ?>">
            <?= $isEdit ? 'Update' : 'Simpan' ?>
        </button>
        <?php if ($isEdit): ?>
            <a href="<?= base_url('employee') ?>" class="btn btn-secondary">Batal</a>
        <?php endif; ?>
    </div>
    </form>
    </div>
    </div>

    <!-- Tabel Daftar Employee -->
    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $i => $e): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($e['nama_employee']) ?></td>
                        <td><?= esc($e['username']) ?></td>
                        <td><?= esc($e['nohp_employee']) ?></td>
                        <td><?= esc($e['alamat_employee']) ?></td>
                        <td><?= esc($e['dob_employee']) ?></td>
                        <td>
                            <a href="<?= base_url('employee/edit/' . $e['id_employee']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('employee/delete/' . $e['id_employee']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>