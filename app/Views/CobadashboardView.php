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
                                    <div class="icon-circle mb-2" style="background-color:#4AD991;">
                                        <i class="las la-user-friends icon-big"></i>
                                    </div>
                                    <a href="<?= base_url('client') ?>" class="btn btn-sm text-white btn-wide" style="background-color: #4AD991;">➕ Add Client</a>


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

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>