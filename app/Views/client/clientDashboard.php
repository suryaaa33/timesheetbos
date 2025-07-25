<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Client Dashboard</title>
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
                <!-- Baris atas: judul dan tombol add -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">Client List</h4>
                    <a href="<?= base_url('client/create') ?>" class="btn btn-primary">+ Add Client</a>
                </div>

                <!-- Baris kedua: dropdown sort -->
                <thead class="table-header align-middle">
                    <tr>
                        <th colspan="2" class="bg-light" style="vertical-align: middle;">
                            <div class="d-flex align-items-center gap-2">
                                <i class="las la-filter fs-5 text-secondary"></i>
                                <form method="get" class="d-flex align-items-center" style="gap: 6px;">
                                    <label for="sort" class="form-label mb-0 fw-normal text-muted small">Sort By:</label>
                                    <select name="sort" id="sort" class="form-select form-select-sm bg-white border-secondary" style="min-width: 140px;" onchange="this.form.submit()">
                                        <option value="">-- Select --</option>
                                        <option value="az" <?= $sort == 'az' ? 'selected' : '' ?>>Name A-Z</option>
                                        <option value="za" <?= $sort == 'za' ? 'selected' : '' ?>>Name Z-A</option>
                                        <option value="newest" <?= $sort == 'newest' ? 'selected' : '' ?>>Newest</option>
                                        <option value="oldest" <?= $sort == 'oldest' ? 'selected' : '' ?>>Oldest</option>
                                    </select>
                                </form>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <!-- Tambahkan kolom lain -->
                    </tr>
                </thead>




                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PHONE</th>
                                <th>EMAIL</th>
                                <th>CP NAME</th>
                                <th>CP PHONE</th>
                                <th>STATUS</th>
                                <th>REGISTER DATE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $i => $e): ?>
                                <tr>
                                    <td><?= $e['id_client'] ?></td>
                                    <td><?= esc($e['nama_client']) ?></td>
                                    <td><?= esc($e['notelp_client']) ?></td>
                                    <td><?= esc($e['email_client']) ?></td>
                                    <td><?= esc($e['namacp_client']) ?></td>
                                    <td><?= esc($e['noHp_cp']) ?></td>
                                    <td>
                                        <?= $e['status_client'] == '1' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Non-Active</span>' ?>
                                    </td>
                                    <td><?= esc($e['registerdate_client']) ?></td>
                                    <td>
                                        <a href="<?= base_url('client/edit/' . $e['id_client']) ?>" class="btn btn-light-icon"><i class="las la-edit icon-big"></i></a>
                                        <a href="#" class="btn btn-light-icon" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                            onclick="setDeleteUrl('<?= base_url('client/delete/' . $e['id_client']) ?>')">
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

    <!-- Modal Konfirmasi Delete -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-5">
                <div class="modal-body border-0">
                    <p class="fs-5 mb-4">Are you sure want to delete this client?</p>
                    <div class="d-flex justify-content-center gap-3">
                        <button type="button" class="btn text-white" style="background-color: #d5d5d5; min-width: 100px;" data-bs-dismiss="modal">No</button>
                        <form id="confirmDeleteForm" method="post">
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
        function setDeleteUrl(url) {
            document.getElementById('confirmDeleteForm').setAttribute('action', url);
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