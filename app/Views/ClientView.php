<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">📇 Daftar Client</h2>

        <!-- ✅ FORM CREATE / EDIT -->
        <?php
        $isEdit = isset($client['id_client']);
        $formAction = $isEdit
            ? base_url('client/update/' . $client['id_client'])
            : base_url('client/store');
        ?>
        <div class="card mb-4 shadow">
            <div class="card-header bg-<?= $isEdit ? 'warning' : 'primary' ?> text-white">
                <?= $isEdit ? '✏️ Edit Client' : '➕ Tambah Client' ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?= $formAction ?>">
                    <div class="mb-3">
                        <label for="nama_client" class="form-label">Nama Client</label>
                        <input type="text" name="nama_client" class="form-control"
                            value="<?= $isEdit ? esc($client['nama_client']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="notelp_client" class="form-label">No. Telp</label>
                        <input type="text" name="notelp_client" class="form-control"
                            value="<?= $isEdit ? esc($client['notelp_client']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_client" class="form-label">Email</label>
                        <input type="email" name="email_client" class="form-control"
                            value="<?= $isEdit ? esc($client['email_client']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="namacp_client" class="form-label">Nama Contact Person</label>
                        <input type="text" name="namacp_client" class="form-control"
                            value="<?= $isEdit ? esc($client['namacp_client']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="noHp_cp" class="form-label">No.Telp Contact Person</label>
                        <input type="text" name="noHp_cp" class="form-control"
                            value="<?= $isEdit ? esc($client['noHp_cp']) : '' ?>" required>
                    </div>
                    <div class="col">
                        <label for="status_client" class="form-label">Status Client</label>
                        <select name="status_client" class="form-control" required>
                            <option value="">-- Pilih Status Client --</option>
                            <option value="1" <?= $isEdit && $client['status_client'] == '1' ? 'selected' : '' ?>>Aktif</option>
                            <option value="0" <?= $isEdit && $client['status_client'] == '0' ? 'selected' : '' ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="registerdate_client" class="form-label">Register Date Client</label>
                        <input type="date" name="registerdate_client" class="form-control" value="<?= $isEdit ? esc($client['registerdate_client']) : '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-<?= $isEdit ? 'warning' : 'primary' ?>">
                        <?= $isEdit ? 'Update' : 'Simpan' ?>
                    </button>
                    <?php if ($isEdit): ?>
                        <a href="<?= base_url('client') ?>" class="btn btn-secondary">Batal</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- ✅ TABEL LIST CLIENT -->
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Client</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Nama Contact Person</th>
                        <th>No.telp Contact Person</th>
                        <th>Status Client</th>
                        <th>Register Date</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $i => $c): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($c['nama_client']) ?></td>
                            <td><?= esc($c['notelp_client']) ?></td>
                            <td><?= esc($c['email_client']) ?></td>
                            <td><?= esc($c['namacp_client']) ?></td>
                            <td><?= esc($c['noHp_cp']) ?></td> 
                            <td>
                                <?= $c['status_client'] == '1' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Tidak Aktif</span>' ?>
                            </td> 
                            <td><?= date('d-m-Y', strtotime($c['registerdate_client'])) ?></td> 
                            <td>
                                <a href="<?= base_url('client/edit/' . $c['id_client']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form method="post" action="<?= base_url('client/delete/' . $c['id_client']) ?>" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>