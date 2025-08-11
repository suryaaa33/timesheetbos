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
                        <div class="fw-bold"><?= session()->get('nama') ?></div>
                        <div class="text-muted small"><?= session()->get('role') ?></div>
                    </div>
                    <i class="las la-user icon-big fs-2"></i>
                </div>
            </div>

            <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>


            <!-- Content -->
            <div class="container-fluid p-4 w-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">Timesheet</h4>
                    <a href="<?= base_url('sheet/user/create') ?>" class="btn btn-primary">+ Add New Sheet</a>
                </div>


                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>PROJECT</th>
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
                                    <td><?= esc($e['judul_role']) ?></td>
                                    <td><?= date('D, d M Y H:i', strtotime($e['last_modified'])) ?></td>
                                    <td>
                                        <a href="<?= base_url('sheet/user/' . $e['id_sheet']) ?>" class="btn btn-light-icon"><i class="las la-chevron-circle-right"></i></i></a>
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