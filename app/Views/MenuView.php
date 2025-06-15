<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">📋 Daftar Menu</h2>
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $i => $m): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($m['nama_menu']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>