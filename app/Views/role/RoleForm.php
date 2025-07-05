<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Add/Edit Role</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/css/form.css') ?>" />
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-4 logo">
            <h4 class="m-0">Bri<span style="color:#000">Sheet</span></h4>
        </div>
        <a href="<?= base_url('dashboard') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-tachometer-alt"></i><span class="ms-2">Dashboard</span>
        </a>
        <a href="<?= base_url('employee') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-user"></i><span class="ms-2">Employee</span>
        </a>
        <a href="<?= base_url('client') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-user-friends"></i><span class="ms-2">Client</span>
        </a>
        <a href="<?= base_url('project') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-cube"></i><span class="ms-2">Project</span>
        </a>
        <a href="<?= base_url('role') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-database"></i><span class="ms-2">Role</span>
        </a>
        <a href="<?= base_url('roledetail') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-server"></i><span class="ms-2">Role Detail</span>
        </a>
        <a href="<?= base_url('menu') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-list"></i><span class="ms-2">Menu</span>
        </a>
        <a href="<?= base_url('sheet') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-calendar-alt"></i><span class="ms-2">Time Sheet</span>
        </a>
        <hr />
        <a href="<?= base_url('/logout') ?>" onclick="return confirm('Are you sure you want to logout?');"
            class="menu-item d-flex align-items-center text-decoration-none text-dark">
            <i class="las la-power-off"></i><span class="ms-2">Logout</span>
        </a>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Header -->
        <div class="header-bar d-flex justify-content-between align-items-center shadow-sm">
            <button class="btn d-md-none" id="sidebarToggle">
                <i class="las la-bars fs-2"></i>
            </button>

            <div class="d-flex align-items-center gap-3 ms-auto">
                <div class="text-end">
                    <div class="fw-bold">Gerit Himawan</div>
                    <div class="text-muted small">Admin</div>
                </div>
                <i class="las la-user icon-big fs-2"></i>
            </div>
        </div>

        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Form Add/Edit Role</h3>

            </div>
            <?php
            $isEdit = isset($role['id_role']);
            $formAction = $isEdit ? base_url('role/update/' . $role['id_role']) : base_url('role/store');
            ?>

            <div class="form-section">
                <div class="d-flex justify-content-center"> <!-- Tambahan ini -->
                    <form method="post" action="<?= $formAction ?>" style="width: 100%; max-width: 500px;"> <!-- Tambahan style -->
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Role Name</label>
                            <input type="text" class="form-control" name="judul_role" placeholder="Enter role name"
                                value="<?= $isEdit ? esc($role['judul_role']) : '' ?>" required>
                        </div>
                        <button type="submit" class="btn-submit"><?= $isEdit ? 'Update' : 'Add Now' ?></button>
                        <?php if ($isEdit): ?>
                            <a href="<?= base_url('role') ?>" class="btn btn-danger d-block mx-auto mt-3" style="width: 150px;">Batal</a>
                        <?php endif ?>
                    </form>
                </div>
            </div>

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