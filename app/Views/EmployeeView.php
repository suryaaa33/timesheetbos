<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">👨‍💼 Data Karyawan</h2>
        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Role ID</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>No. HP</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $i => $e): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($e['nama_employee']) ?></td>
                            <td><?= esc($e['id_role']) ?></td>
                            <td><?= esc($e['alamat_employee']) ?></td>
                            <td><?= esc($e['dob_employee']) ?></td>
                            <td><?= esc($e['nohp_employee']) ?></td>
                            <td><?= esc($e['username']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>