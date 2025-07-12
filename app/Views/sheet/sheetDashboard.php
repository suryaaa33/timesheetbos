<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sheet Dashboard</title>
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
            <a href="<?= base_url('dashboard') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
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
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">Timesheet</h4>
                </div>


                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>PROJECT</th>
                                <th>EMPLOYEE</th>
                                <th>ROLE</th>
                                <th>ACTIVITY DURATION</th>
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
                                    <td>
                                        <?php
                                        $totalMinutes = (int) $e['hours_sheet'];
                                        $days = floor($totalMinutes / (60 * 8)); // 1 hari kerja = 8 jam
                                        $hours = floor(($totalMinutes % (60 * 8)) / 60);
                                        $minutes = $totalMinutes % 60;

                                        // Tampilkan hanya bagian yang ada nilainya
                                        $parts = [];
                                        if ($days > 0) $parts[] = $days . 'd';
                                        if ($hours > 0) $parts[] = $hours . 'h';
                                        if ($minutes > 0) $parts[] = $minutes . 'm';

                                        echo implode(' ', $parts);
                                        ?>
                                    </td>

                                    <td><?= esc($e['last_modified']) ?></td>
                                    <td>
                                        <a href="<?= base_url('sheet/' . $e['id_sheet']) ?>" class="btn btn-light-icon"><i class="las la-chevron-circle-right"></i></i></a>
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