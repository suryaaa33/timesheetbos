<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Add/Edit Client</title>
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
                    <div class="fw-bold"><?= esc(session()->get('nama')) ?></div>
                    <div class="text-muted small"><?= esc(session()->get('role')) ?></div>
                </div>
                <i class="las la-user icon-big fs-2"></i>
            </div>
        </div>

        <?php
        $isEdit = isset($client['id_client']);
        $formAction = $isEdit ? base_url('client/update/' . $client['id_client']) : base_url('client/store');
        ?>

        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Form Client</h3>
                <?php if ($isEdit): ?>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        onclick="setDeleteUrl('<?= base_url('client/delete/' . $client['id_client']) ?>')">Delete Client</a>
                <?php endif ?>
            </div>

            <!-- Form -->
            <div class="form-section">
                <form method="post" action="<?= $formAction ?>">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="clientName" class="form-label">Client Name</label>
                            <input type="text" class="form-control" name="nama_client" placeholder="Enter client name"
                                value="<?= $isEdit ? esc($client['nama_client']) : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="contactName" class="form-label">Client Contact Person Name</label>
                            <input type="text" class="form-control" name="namacp_client" placeholder="Enter contact name"
                                value="<?= $isEdit ? esc($client['namacp_client']) : '' ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="phone" class="form-label">Client Phone Number</label>
                            <input type="text" class="form-control" name="notelp_client" placeholder="Enter contact number"
                                value="<?= $isEdit ? esc($client['notelp_client']) : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="telp" class="form-label">Client Contact Person Phone Number</label>
                            <input type="text" class="form-control" name="noHp_cp" placeholder="Enter telephone number"
                                value="<?= $isEdit ? esc($client['noHp_cp']) : '' ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_client" placeholder="Enter client email"
                                value="<?= $isEdit ? esc($client['email_client']) : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <label class="form-label">Status</label>
                            <div class="d-flex flex-column">
                                <label class="mb-2">
                                    <input type="radio" name="status_client" value="1"
                                        <?= $isEdit && $client['status_client'] == '1' ? 'checked' : '' ?>> Active
                                </label>
                                <label>
                                    <input type="radio" name="status_client" value="0"
                                        <?= $isEdit && $client['status_client'] == '0' ? 'checked' : '' ?>> Non-Active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="registerDate" class="form-label">Register Date</label>
                            <input type="date" class="form-control" name="registerdate_client"
                                value="<?= $isEdit ? esc($client['registerdate_client']) : '' ?>" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php if ($isEdit): ?>
                            <a href="<?= base_url('client') ?>" class="btn-cancel">Cancel</a>
                        <?php endif ?>
                        <button type="submit" class="btn-submit"><?= $isEdit ? 'Save' : 'Add Now' ?></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Konfirmasi Delete -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center p-5">
                    <div class="modal-body border-0">
                        <p class="fs-5 mb-4">Are you sure want to delete this project?</p>
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