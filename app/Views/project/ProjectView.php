<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center"> Daftar Project</h2>

        <!-- Form Tambah / Edit -->
        <?php
        $isEdit = isset($project['id_project']);
        $formAction = $isEdit
            ? base_url('project/update/' . $project['id_project'])
            : base_url('project/store');
        ?>
        <div class="card mb-4 shadow">
            <div class="card-header bg-<?= $isEdit ? 'warning' : 'primary' ?> text-white">
                <?= $isEdit ? '✏️ Edit Project' : '➕ Tambah Project' ?>
            </div>

            <div class="card-body">
                <form method="post" action="<?= $formAction ?>">

                    <div class="mb-3">
                        <label for="nama_project" class="form-label">Nama Project</label>
                        <input type="text" name="nama_project" class="form-control" placeholder="Nama Project" value="<?= $isEdit ? esc($project['nama_project']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_project" class="form-label">Deskripsi Project</label>
                        <input type="text" name="deskripsi_project" class="form-control" placeholder="Deskripsi Project" value="<?= $isEdit ? esc($project['deskripsi_project']) : '' ?>" required>
                    </div>
                    <div class="col">
                        <label for="status_project" class="form-label">Status Project</label>
                        <select name="status_project" class="form-control" required>
                            <option value="">-- Pilih Status Project --</option>
                            <option value="1" <?= $isEdit && $project['status_project'] == 0 ? 'selected' : '' ?>>0 - On Process</option>
                            <option value="2" <?= $isEdit && $project['status_project'] == 1 ? 'selected' : '' ?>>1 - Completed</option>
                        </select>
                    </div>

                    <div class="col">
                        <label for="startdate_project" class="form-label">Start Date Project</label>
                        <input type="date" name="startdate_project" class="form-control" value="<?= $isEdit ? esc($project['startdate_project']) : '' ?>" required>
                    </div>
                    <div class="col">
                        <label for="enddate_project" class="form-label">End Date Project</label>
                        <input type="date" name="enddate_project" class="form-control" value="<?= $isEdit ? esc($project['enddate_project']) : '' ?>" required>
                    </div>
                    <div class="col">
                        <label for="deadline_project" class="form-label">Deadline Project</label>
                        <input type="date" name="deadline_project" class="form-control" value="<?= $isEdit ? esc($project['deadline_project']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="budget_project" class="form-label">Budget Project</label>
                        <input type="text" name="budget_project" id="budget_project" class="form-control"
                            value="<?= $isEdit ? number_format((int)$project['budget_project'], 0, ',', '.') : '' ?>"
                            required>
                    </div>


            </div>
            <div class="col">
                <label for="id_client" class="form-label">Client yang Bersangkutan</label>
                <select name="id_client" class="form-control" required>
                    <option value="">-- Pilih Client --</option>
                    <?php foreach ($clients as $c): ?>
                        <option value="<?= $c['id_client'] ?>"
                            <?= isset($isEdit) && $isEdit && $project['id_client'] == $c['id_client'] ? 'selected' : '' ?>>
                            <?= $c['id_client'] ?> - <?= esc($c['nama_client']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col mt-3">
                <label for="id_employee" class="form-label">Penanggung Jawab (Employee)</label>
                <select name="id_employee" class="form-control" required>
                    <option value="">-- Pilih Employee --</option>
                    <?php foreach ($employees as $e): ?>
                        <option value="<?= $e['id_employee'] ?>"
                            <?= isset($isEdit) && $isEdit && $project['id_employee'] == $e['id_employee'] ? 'selected' : '' ?>>
                            <?= $e['id_employee'] ?> - <?= esc($e['nama_employee']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div>
                <button type="submit" class="btn btn-<?= $isEdit ? 'warning' : 'primary' ?>">
                    <?= $isEdit ? 'Update' : 'Simpan' ?>
                </button>
                <?php if ($isEdit): ?>
                    <a href="<?= base_url('project') ?>" class="btn btn-secondary">Batal</a>
                <?php endif; ?>
            </div>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Project -->
    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Project</th>
                    <th>Deskripsi Project</th>
                    <th>Status Project</th>
                    <th>Start Date Project</th>
                    <th>End date Project</th>
                    <th>Deadline Project</th>
                    <th>Budget Project</th>
                    <th>Client yang Bersangkutan</th>
                    <th>Penanggung Jawab Project</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $i => $e): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($e['nama_project']) ?></td>
                        <td><?= esc($e['deskripsi_project']) ?></td>
                        <td><?= esc($e['status_project']) ?></td>
                        <td><?= esc($e['startdate_project']) ?></td>
                        <td><?= esc($e['enddate_project']) ?></td>
                        <td><?= esc($e['deadline_project']) ?></td>
                        <td><?= esc($e['budget_project']) ?></td>
                        <td><?= esc($e['id_client']) ?></td>
                        <td><?= esc($e['id_employee']) ?></td>
                        <td>
                            <a href="<?= base_url('project/edit/' . $e['id_project']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('project/delete/' . $e['id_project']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
    <script>
    const budgetInput = document.getElementById('budget_project');

    budgetInput.addEventListener('input', function(e) {
        let angka = this.value.replace(/[^\d]/g, ''); // hapus selain angka
        this.value = formatRupiah(angka, 'Rp ');
    });

    function formatRupiah(angka, prefix) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
    }
</script>

</body>

</html>