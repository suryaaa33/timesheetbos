<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Role Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">🔐 Daftar Akses Role ke Menu</h2>

        <?php
        $isEdit = isset($roledetail['id_roledetail']);
        $formAction = $isEdit
            ? base_url('roledetail/update/' . $roledetail['id_roledetail'])
            : base_url('roledetail/store');
        ?>

        <div class="card mb-4 shadow">
            <div class="card-header bg-<?= $isEdit ? 'warning' : 'primary' ?> text-white">
                <?= $isEdit ? '✏️ Edit Akses Role' : '➕ Tambah Akses Role' ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?= $formAction ?>">
                    <div class="mb-3">
                        <label for="id_role" class="form-label">Role</label>
                        <select name="id_role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role['id_role'] ?>" <?= $isEdit && $roledetail['id_role'] == $role['id_role'] ? 'selected' : '' ?>>
                                    <?= $role['id_role'] ?> - <?= esc($role['judul_role']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_menu" class="form-label">Menu</label>
                        <select name="id_menu" class="form-control" required>
                            <option value="">-- Pilih Menu --</option>
                            <?php foreach ($menus as $menu): ?>
                                <option value="<?= $menu['id_menu'] ?>" <?= $isEdit && $roledetail['id_menu'] == $menu['id_menu'] ? 'selected' : '' ?>>
                                    <?= $menu['id_menu'] ?> - <?= esc($menu['nama_menu']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-<?= $isEdit ? 'warning' : 'primary' ?>">
                        <?= $isEdit ? 'Update' : 'Simpan' ?>
                    </button>
                    <?php if ($isEdit): ?>
                        <a href="<?= base_url('roledetail') ?>" class="btn btn-secondary">Batal</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- TABEL -->
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>Menu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roledetails as $i => $rd): ?>
                        <?php
                            $role = array_filter($roles, fn($r) => $r['id_role'] == $rd['id_role']);
                            $role = reset($role);

                            $menu = array_filter($menus, fn($m) => $m['id_menu'] == $rd['id_menu']);
                            $menu = reset($menu);
                        ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($role['judul_role'] ?? 'Unknown') ?></td>
                            <td><?= esc($menu['nama_menu'] ?? 'Unknown') ?></td>
                            <td>
                                <a href="<?= base_url('roledetail/edit/' . $rd['id_roledetail']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('roledetail/delete/' . $rd['id_roledetail']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
