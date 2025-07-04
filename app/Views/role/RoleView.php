<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">🧩 Daftar Role</h2>

        <?php
        $isEdit = isset($role['id_role']);
        $formAction = $isEdit
            ? base_url('role/update/' . $role['id_role'])
            : base_url('role/store');
        ?>
        <div class="card mb-4 shadow">
            <div class="card-header bg-<?= $isEdit ? 'warning' : 'primary' ?> text-white">
                <?= $isEdit ? '✏️ Edit Role' : '➕ Tambah Role' ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?= $formAction ?>">
                    <div class="mb-3">
                        <label for="judul_role" class="form-label">Judul Role</label>
                        <input type="text" name="judul_role" class="form-control"
                            value="<?= $isEdit ? esc($role['judul_role']) : '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-<?= $isEdit ? 'warning' : 'primary' ?>">
                        <?= $isEdit ? 'Update' : 'Simpan' ?>
                    </button>
                    <?php if ($isEdit): ?>
                        <a href="<?= base_url('role') ?>" class="btn btn-secondary">Batal</a>
                    <?php endif ?>
                </form>
            </div>
        </div>

        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $i => $r): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($r['judul_role']) ?></td>
                            <td>
                                <a href="<?= base_url('role/edit/' . $r['id_role']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('role/delete/' . $r['id_role']) ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>