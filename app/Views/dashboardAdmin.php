<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboardadmin.css') ?>" />
</head>

<body class="d-flex">
    <?= view('partials/sidebarAdmin') ?>

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

        <div class="container-fluid p-4 w-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Dashboard</h4>
            </div>

            <!-- Card Summary Content -->
            <div class="main-content">
                <div class="row g-4">
                    <!-- Example: Employee -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Employee</div>
                                    <h4 class="mb-2"><?= $total_employee ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#8280FF;">
                                        <i class="las la-user icon-big"></i>
                                    </div>
                                    <a href="<?= base_url('employee') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #8280FF;">
                                        ➕ Add Employee
                                    </a>
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
                                    <div class="icon-circle mb-2" style="background-color: rgba(148, 250, 199, 0.5);">
                                        <img src="<?= base_url('assets/client.png') ?>" alt="Client Icon" width="50" height="50">
                                    </div>
                                    <a href="<?= base_url('client') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #5AD991;">➕ Add Client</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Project -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Project</div>
                                    <h4 class="mb-2"><?= $total_project ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#FEC53D;">
                                        <i class="las la-cube icon-big"></i>
                                    </div>
                                    <a href="<?= base_url('project') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #FEC53D;">➕ Add Project</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Menu -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Menu</div>
                                    <h4 class="mb-2"><?= $total_menu ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#ff9f68;">
                                        <i class="las la-list icon-big"></i>
                                    </div>
                                    <a href="<?= base_url('menu') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #ff9f68;">➕ Add Menu</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Role -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Role</div>
                                    <h4 class="mb-2"><?= $total_role ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#ff6b6b;">
                                        <i class="las la-database icon-big"></i>
                                    </div>
                                    <a href="<?= base_url('role') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #ff6b6b;">➕ Add Role</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Role Detail -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Role Detail</div>
                                    <h4 class="mb-2"><?= $total_roledetail ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#3edbf0;">
                                        <i class="las la-server icon-big"></i>
                                    </div>
                                    <a href="<?= base_url('roledetail') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #3edbf0;">➕ Add Role Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Sheet -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card summary-card shadow">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="mb-1">Total Sheet</div>
                                    <h4 class="mb-2"><?= $total_sheet ?></h4>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="icon-circle mb-2" style="background-color:#ff7eb9;">
                                        <i class="las la-calendar-alt icon-big"></i>
                                    </div>
                                    <a href="<?= base_url('sheet') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #ff7eb9;">➕ Add Sheet</a>
                                </div>
                            </div>
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