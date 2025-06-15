<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">📁 Daftar Project</h2>
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Project</th>
                        <th>Deskripsi</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Deadline</th>
                        <th>Budget</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $i => $p): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($p['nama_project']) ?></td>
                            <td><?= esc($p['deskripsi_project']) ?></td>
                            <td><?= esc($p['startdate_project']) ?></td>
                            <td><?= esc($p['enddate_project']) ?></td>
                            <td><?= esc($p['deadline_project']) ?></td>
                            <td>Rp <?= number_format($p['budget_project'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>