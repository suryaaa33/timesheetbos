<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
    }

    .sidebar {
        width: 250px;
        min-height: 100vh;
        background-color: #ffffff;
        border-right: 1px solid #dee2e6;
    }

    .sidebar .logo {
        font-weight: bold;
        color: #6cc3ff;
    }

    .sidebar .menu-item {
        padding: 10px 15px;
        cursor: pointer;
        font-size: 16px;
    }

    .sidebar .menu-item:hover,
    .sidebar .menu-item.active {
        background-color: #6cc3ff;
        border-radius: 5px;
    }

    .main-container {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .header-bar {
        background-color: #ffffff;
        padding: 1rem 2rem;
        border-bottom: 1px solid #dee2e6;
        border-radius: 0;
        margin-bottom: 2rem;
    }

    .main-content {
        padding: 0 2rem 2rem 2rem;
    }

    .table-container {
        border-radius: 12px;
        overflow: hidden;
        margin-top: 1rem;
    }

    .custom-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-header th {
        background-color: #f8f9fa;
        border: none;
        padding: 1rem;
        font-weight: bold;
        border-bottom: 2px solid #dee2e6;
    }

    .table td,
    .table th {
        padding: 1rem;
        vertical-align: middle;
    }

    .table td button {
        font-size: 16px;
        line-height: 1;
    }

    .custom-table td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #dee2e6;
    }

    .custom-table tr:last-child td {
        border-bottom: none;
    }

    .btn-outline-primary,
    .btn-outline-danger {
        border-radius: 6px;
        padding: 4px 8px;
    }

    .icon-big {
        font-size: 20px;
    }

    .btn-light-icon {
        background-color: #f8f9fa;
        border: none;
        padding: 6px 10px;
        border-radius: 5px;
        transition: background-color 0.2s;
    }

    .btn-light-icon:hover {
        background-color: #e2e6ea;
    }
</style>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <div class="text-center mb-4 logo">
                <h4 class="m-0">Bri<span style="color:#000">Sheet</span></h4>
            </div>
            <a href="<?= base_url('cobadashboard') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-tachometer-alt"></i>
                <span class="ms-2">Dashboard</span>
            </a>
            <a href="<?= base_url('employee') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-user"></i>
                <span class="ms-2">Employee</span>
            </a>
            <a href="<?= base_url('client') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-user-friends"></i>
                <span class="ms-2">Client</span>
            </a>
            <a href="<?= base_url('project') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-cube"></i>
                <span class="ms-2">Project</span>
            </a>
            <a href="<?= base_url('role') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-database"></i>
                <span class="ms-2">Role</span>
            </a>
            <a href="<?= base_url('roledetail') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-server"></i>
                <span class="ms-2">Role Detail</span>
            </a>
            <a href="<?= base_url('menu') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-list"></i>
                <span class="ms-2">Menu</span>
            </a>
            <a href="<?= base_url('sheet') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-calendar-alt"></i>
                <span class="ms-2">Time Sheet</span>
            </a>
            <hr />
            <a href="<?= base_url('/logout') ?>" onclick="return confirm('Are you sure you want to logout?');"
                class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-power-off"></i>
                <span class="ms-2">Logout</span>
            </a>
        </div>

        <!-- Main Content -->
        <div class="main-container">
            <!-- Header -->
            <div class="header-bar d-flex justify-content-between align-items-center shadow-sm">
                <h2>Dashboard</h2>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <div class="fw-bold">Gerit Himawan</div>
                        <div class="text-muted small">Admin</div>
                    </div>
                    <i class="las la-user icon-big"></i>
                </div>
            </div>

            <div class="container-fluid p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Employee List</h4>
                    <a href="<?= base_url('employee/create') ?>" class="btn btn-primary">+ Add Employee</a>

                </div>

                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $i => $e): ?>
                                <tr>
                                    <td><?= $e['id_employee'] ?></td>
                                    <td><?= esc($e['nama_employee']) ?></td>
                                    <td><?= esc($e['username']) ?></td>
                                    <td><?= esc($e['nohp_employee']) ?></td>
                                    <td><?= esc($e['alamat_employee']) ?></td>
                                    <td><?= esc($e['dob_employee']) ?></td>
                                    <td>
                                        <?php
                                        if ($e['id_role'] == 1) echo 'Konsultan';
                                        elseif ($e['id_role'] == 2) echo 'Technical Writer';
                                        elseif ($e['id_role'] == 3) echo 'Direktur';
                                        else echo 'Tidak diketahui';
                                        ?>
                                    </td>
                                    <td>
                                        <?= $e['status_employee'] == '1' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Tidak Aktif</span>' ?>
                                    </td>

                                    <td>
                                        <a href="<?= base_url('employee/edit/' . $e['id_employee']) ?>" class="btn btn-light-icon"><i class="las la-edit icon-big"></i></a>
                                        <a href="<?= base_url('employee/delete/' . $e['id_employee']) ?>" class="btn btn-light-icon" onclick="return confirm('Yakin ingin menghapus?')"><i class="las la-trash icon-big"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>




            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>