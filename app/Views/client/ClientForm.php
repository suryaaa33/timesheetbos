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
        <a href="<?= base_url('cobadashboard') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
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
                <h3>Form Client</h3>

            </div>


            <?php
            $isEdit = isset($client['id_client']);
            $formAction = $isEdit ? base_url('client/update/' . $client['id_client']) : base_url('client/store');
            ?>
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
                    <button type="submit" class="btn-submit"><?= $isEdit ? 'Update' : 'Add Now' ?></button>
                    <?php if ($isEdit): ?>
                        <a href="<?= base_url('client') ?>" class="btn btn-danger d-block mx-auto mt-3" style="width: 150px;">Batal</a>
                    <?php endif ?>
                </form>
            </div>
        </div>
</body>

</html>