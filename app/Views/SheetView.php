<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Timesheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">📋 Timesheet Pegawai</h2>
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Proyek</th>
                        <th>Aktivitas</th>
                        <th>Jam Kerja (Raw)</th>
                        <th>Result File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sheets as $i => $sheet): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($sheet['date_sheet']) ?></td>
                            <td><?= esc($sheet['nama_employee']) ?></td>
                            <td><?= esc($sheet['nama_project']) ?></td>
                            <td><?= esc($sheet['activity']) ?></td>
                            <td><?= esc($sheet['hours_sheet']) ?></td>
                            <td>
                                <?php if (!empty($sheet['result_path'])): ?>
                                    <a href="<?= base_url('uploads/' . $sheet['result_path']) ?>" target="_blank" class="btn btn-sm btn-primary">View</a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>