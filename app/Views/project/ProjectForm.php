<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Add/Edit Project</title>
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

        <?php
        $isEdit = isset($project['id_project']);
        $formAction = $isEdit ? base_url('project/update/' . $project['id_project']) : base_url('project/store');
        ?>

        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Form Project</h3>
                <?php if ($isEdit): ?>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        onclick="setDeleteUrl('<?= base_url('project/delete/' . $project['id_project']) ?>')">Delete Project</a>
                <?php endif ?>
            </div>

            <!-- Form -->
            <div class="form-section">
                <form method="post" action="<?= $formAction ?>">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="projectName" class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="nama_project" placeholder="Enter project name"
                                value="<?= $isEdit ? esc($project['nama_project']) : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="budgetProject" class="form-label">Project Budget</label>
                            <input type="text"  id="budget_project" class="form-control" name="budget_project" placeholder="Enter project budget"
                                value="<?= $isEdit ? number_format((int)$project['budget_project'], 0, ',', '.') : '' ?>"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="projectDescription" class="form-label">Project Description</label>
                            <textarea class="form-control" name="deskripsi_project" placeholder="Enter project description" rows="4" required><?= $isEdit ? esc($project['deskripsi_project']) : '' ?></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="id_client" class="form-label">Project Client</label>
                            <select name="id_client" class="form-control" required>
                                <option value="">Select Project Client</option>
                                <?php foreach ($clients as $c): ?>
                                    <option value="<?= $c['id_client'] ?>"
                                        <?= isset($isEdit) && $isEdit && $project['id_client'] == $c['id_client'] ? 'selected' : '' ?>>
                                        <?= $c['id_client'] ?> - <?= esc($c['nama_client']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="deadline" class="form-label">Project Deadline</label>
                            <input type="date" class="form-control" name="deadline_project"
                                value="<?= $isEdit ? esc($project['deadline_project']) : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="id_employee" class="form-label">Project PIC</label>
                            <select name="id_employee" class="form-control" required>
                                <option value="">Select Project PIC</option>
                                <?php foreach ($employees as $e): ?>
                                    <option value="<?= $e['id_employee'] ?>"
                                        <?= isset($isEdit) && $isEdit && $project['id_employee'] == $e['id_employee'] ? 'selected' : '' ?>>
                                        <?= $e['id_employee'] ?> - <?= esc($e['nama_employee']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="startdate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="startdate_project"
                                value="<?= $isEdit ? esc($project['startdate_project']) : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="enddate" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="enddate_project"
                                value="<?= $isEdit ? esc($project['enddate_project']) : '' ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            <label class="form-label">Status</label>
                            <div class="d-flex flex-column">
                                <label class="mb-2">
                                    <input type="radio" name="status_project" value="1"
                                        <?= $isEdit && $project['status_project'] == '1' ? 'checked' : '' ?>> Completed
                                </label>
                                <label>
                                    <input type="radio" name="status_project" value="0"
                                        <?= $isEdit && $project['status_project'] == '0' ? 'checked' : '' ?>> On-Process
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php if ($isEdit): ?>
                            <a href="<?= base_url('project') ?>" class="btn-cancel">Cancel</a>
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
            const budgetInput = document.getElementById('budget_project');

            budgetInput.addEventListener('input', function(e) {
                let angka = this.value.replace(/[^\d]/g, ''); // hapus selain angka
                this.value = formatRupiah(angka, 'Rp ');
            });

            function formatRupiah(angka, prefix) {
                let number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
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