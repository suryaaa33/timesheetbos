<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>📝 TIMESHEET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        input[type="text"],
        input[type="date"],
        input[type="time"] {
            border: none;
            background-color: transparent;
            width: 100%;
        }

        table input:focus {
            outline: 1px solid #0d6efd;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">🗓️ Lembar Aktivitas Harian</h2>

        <!-- ✅ Form Tambah Data -->
        <form method="post" action="<?= base_url('sheet/store') ?>" class="mb-4 border rounded p-3 shadow-sm bg-light">
            <div class="row g-2">
                <div class="col-md-2">
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <input type="time" name="jam" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="aktivitas" class="form-control" placeholder="Aktivitas" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="hasil" class="form-control" placeholder="Hasil" required>
                </div>
                <div class="col-md-1 d-grid">
                    <button type="submit" class="btn btn-primary">➕</button>
                </div>
            </div>
        </form>

        <!-- ✅ Form Edit Semua -->
        <form method="post" action="<?= base_url('sheet/updateAll') ?>">
            <div class="table-responsive shadow-sm">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:20%;">Tanggal</th>
                            <th style="width:15%;">Jam</th>
                            <th style="width:30%;">Aktivitas</th>
                            <th style="width:20%;">Hasil</th>
                            <th style="width:10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sheets as $i => $s): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td>
                                    <input type="hidden" name="id_sheet[]" value="<?= $s['id_sheet'] ?>">
                                    <input type="date" name="tanggal[]" value="<?= esc($s['date_sheet']) ?>">
                                </td>
                                <td><input type="time" name="jam[]" value="<?= esc($s['hours_sheet']) ?>"></td>
                                <td><input type="text" name="aktivitas[]" value="<?= esc($s['activity']) ?>"></td>
                                <td><input type="text" name="hasil[]" value="<?= esc($s['result_path']) ?>"></td>
                                <td>
                                    <a href="<?= base_url('sheet/delete/' . $s['id_sheet']) ?>"
                                        onclick="return confirm('Yakin ingin menghapus?')"
                                        class="btn btn-sm btn-danger">🗑️</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>

</html>