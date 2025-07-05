<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Role Dashboard</title>
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
                        <div class="fw-bold">Gerit Himawan</div>
                        <div class="text-muted small">Admin</div>
                    </div>
                    <i class="las la-user icon-big fs-2"></i>
                </div>
            </div>


            <!-- Content -->
            <div class="container-fluid p-4 w-100">
                <!-- Baris atas: judul dan tombol add -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">Role List</h4>
                    <a href="<?= base_url('role/create') ?>" class="btn btn-primary">+ Add Role</a>
                </div>


                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>ROLE NAME</th>
                                <th>TOTAL EMPLOYEE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles as $i => $r): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= esc($r['judul_role']) ?></td>
                                    <td><?= esc($r['total_employee']) ?></td>
                                    <td>
                                        <a href="<?= base_url('role/edit/' . $r['id_role']) ?>" class="btn btn-light-icon"><i class="las la-edit icon-big"></i></a>
                                        <a href="#" class="btn btn-light-icon" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                            onclick="setDeleteUrl('<?= base_url('role/delete/' . $r['id_role']) ?>')">
                                            <i class="las la-trash icon-big"></i>
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
</body>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin menghapus role ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function setDeleteUrl(url) {
        document.getElementById('confirmDeleteBtn').setAttribute('href', url);
    }
</script>


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