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
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Client</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Nama Contact Person</th>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>