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
        <?= view('partials/sidebarUser') ?>

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

            <!-- Modal Konfirmasi Logout -->
        <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center p-5">
                    <div class="modal-body border-0">
                        <p class="fs-5 mb-4">Are you sure you want to logout?</p>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" class="btn text-white" style="background-color: #d5d5d5; min-width: 100px;" data-bs-dismiss="modal">No</button>
                            <form action="<?= base_url('logout') ?>" method="post">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn text-white" style="background-color: #4880FF; min-width: 100px;">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        })
    });
        
    </script>
</body>

</html>