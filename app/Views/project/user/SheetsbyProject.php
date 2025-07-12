<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Timesheet Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboardTable.css') ?>" />
</head>

<body>
    <div class="d-flex">
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
            <a href="<?= base_url('role/user') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-database"></i>
                <span class="ms-2">Role Assigned</span>
            </a>
            <a href="<?= base_url('roledetail') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
                <i class="las la-folder-plus"></i>
                <span class="ms-2">Create Timesheet</span>
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
                <button class="btn d-md-none" id="sidebarToggle">
                    <i class="las la-bars fs-2"></i>
                </button>
                <div class="d-flex align-items-center gap-3 ms-auto">
                    <div class="text-end">
                        <div class="fw-bold"><?= esc(session()->get('nama')) ?></div>
                        <div class="text-muted small"><?= esc(session()->get('role')) ?></div>
                    </div>
                    <i class="las la-user icon-big fs-2"></i>
                </div>
            </div>

            <!-- Content -->
            <div class="container-fluid p-4 w-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Timesheet Project: <?= esc($sheets[0]['nama_project'] ?? 'Unknown') ?></h4>
                </div>

                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>Project</th>
                                <th>Employee</th>
                                <th>Role</th>
                                <th>Activity Duration</th>
                                <th>Last Modified</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sheets as $s): ?>
                                <tr>
                                    <td><?= esc($s['id_sheet']) ?></td>
                                    <td><?= esc($s['nama_project']) ?></td>
                                    <td><?= esc($s['nama_employee']) ?></td>
                                    <td><?= esc($s['judul_role']) ?></td>
                                    <td>
                                        <?php
                                        $minutes = $s['total_minutes'];
                                        $days = floor($minutes / (60 * 8)); // 1 hari = 8 jam kerja
                                        $hours = floor(($minutes % (60 * 8)) / 60);
                                        $mins = $minutes % 60;
                                        echo "{$days}d {$hours}h {$mins}m";
                                        ?>
                                    </td>
                                    <td><?= esc($s['last_modified']) ?></td>
                                    <td>
                                        <a href="<?= base_url('project/user/' . $s['id_project'] . '/' . $s['id_employee']) ?>" class="btn btn-sm btn-primary">
                                            detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebar = document.querySelector(".sidebar");
        const body = document.body;

        toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("show");
            body.classList.toggle("sidebar-open");
        });

        document.addEventListener("click", function(e) {
            if (
                sidebar.classList.contains("show") &&
                !sidebar.contains(e.target) &&
                !toggleBtn.contains(e.target)
            ) {
                sidebar.classList.remove("show");
                body.classList.remove("sidebar-open");
            }
        });
    </script>
</body>

</html>