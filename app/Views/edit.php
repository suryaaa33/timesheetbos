<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">✏️ Edit Client</h2>
        <div class="card shadow rounded p-4">
            <form action="/client/update/<?= $client['id_client'] ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Client</label>
                    <input type="text" name="nama_client" value="<?= esc($client['nama_client']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No. Telp</label>
                    <input type="text" name="notelp_client" value="<?= esc($client['notelp_client']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email_client" value="<?= esc($client['email_client']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Contact Person</label>
                    <input type="text" name="namacp_client" value="<?= esc($client['namacp_client']) ?>" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/client" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>

</html>
