<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">📋 Daftar Menu</h2>

        <!-- Form Tambah / Edit -->
        <?php
        $isEdit = isset($menu['id_menu']);
        $formAction = $isEdit
            ? base_url('menu/update/' . $menu['id_menu'])
            : base_url('menu/store');
        ?>
        <div class="card mb-4 shadow">
            <div class="card-header bg-<?= $isEdit ? 'warning' : 'primary' ?> text-white">
                <?= $isEdit ? '✏️ Edit Menu' : '➕ Tambah Menu' ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?= $formAction ?>">
                    <div class="mb-3">
                        <label for="nama_menu" class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" value="<?= $isEdit ? esc($menu['nama_menu']) : '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-<?= $isEdit ? 'warning' : 'primary' ?>">
                        <?= $isEdit ? 'Update' : 'Simpan' ?>
                    </button>
                    <?php if ($isEdit): ?>
                        <a href="<?= base_url('menu') ?>" class="btn btn-secondary">Batal</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Menu -->
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $i => $m): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($m['nama_menu']) ?></td>
                            <td>
                                <a href="<?= base_url('menu/edit/' . $m['id_menu']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('menu/delete/' . $m['id_menu']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
