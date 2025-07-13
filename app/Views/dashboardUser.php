<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboarduser.css') ?>" />
</head>

<body class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <div class="text-center mb-4 logo">
            <h4 class="m-0">Bri<span style="color:#000">Sheet</span></h4>
        </div>
        <a href="<?= base_url('dashboarduser') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-tachometer-alt"></i>
            <span class="ms-2">Dashboard</span>
        </a>
        <a href="<?= base_url('sheet/user') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-calendar-alt"></i>
            <span class="ms-2">Time Sheet</span>
        </a>
        <a href="<?= base_url('project/user') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-cube"></i>
            <span class="ms-2">Project Assigned</span>
        </a>
        <hr />
        <a href="<?= base_url('/logout') ?>" onclick="return confirm('Are you sure you want to logout?');"
            class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-power-off"></i>
            <span class="ms-2">Logout</span>
        </a>
    </div>

    <div class="sidebar-overlay d-md-none"></div>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Header -->
        <div class="header-bar d-flex justify-content-between align-items-center shadow-sm">
            <button class="btn d-md-none" id="sidebarToggle">
                <i class="las la-bars fs-2"></i>
            </button>
            <div class="d-flex align-items-center gap-3 ms-auto">
                <div class="text-end">
                    <div class="fw-bold"><?= session()->get('nama') ?></div>
                    <div class="text-muted small"><?= session()->get('role') ?></div>
                </div>
                <i class="las la-user icon-big fs-2"></i>
            </div>
        </div>

        <div class="container-fluid p-4 w-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Dashboard</h4>
            </div>

            <div class="main-content">
                <div class="row g-4">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Sheets</div>
                                    <h4 class="mb-2"><?= $total_sheet ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#8280FF;">
                                        <i class="las la-user icon-big"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Project Assigned</div>
                                    <h4 class="mb-2"><?= $total_project ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color: rgba(148, 250, 199, 0.5);">
                                        <img src="<?= base_url('assets/client.png') ?>" alt="Client Icon" width="50" height="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Client</div>
                                    <h4 class="mb-2"><?= $total_client ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#FEC53D;">
                                        <i class="las la-cube icon-big"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Recent Sheets</h4>
            </div>
            <div class="table-container table-responsive bg-white shadow-sm mt-4">
                <table class="table align-middle mb-0 custom-table">
                    <thead class="table-header">
                        <tr>
                            <th>ID</th>
                            <th>PROJECT</th>
                            <th>EMPLOYEE</th>
                            <th>ROLE</th>
                            <th>LAST MODIFIED</th>
                            <th>DETAILS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sheets as $i => $e): ?>
                            <tr>
                                <td><?= $e['id_sheet'] ?></td>
                                <td><?= esc($e['nama_project']) ?></td>
                                <td><?= esc($e['nama_employee']) ?></td>
                                <td><?= esc($e['judul_role']) ?></td>
                                <td><?= esc($e['last_modified']) ?></td>
                                <td>
                                    <a href="<?= base_url('sheet/user/' . $e['id_sheet']) ?>" class="btn btn-light-icon"><i class="las la-chevron-circle-right"></i></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            const overlay = document.querySelector('.sidebar-overlay');

            toggleBtn?.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });

            overlay?.addEventListener('click', () => {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        </script>



</body>

</html>