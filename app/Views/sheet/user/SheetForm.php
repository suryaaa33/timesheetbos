<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Timesheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/form.css') ?>" />
</head>

<body>
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

        <?php
        $isEdit = isset($sheet['id_sheet']);
        $formAction = $isEdit ? base_url('sheet/user/update/' . $sheet['id_sheet']) : base_url('sheet/user/store');

        // data dari session
        $namaEmployee = session()->get('nama');
        $judulRole = session()->get('role');

        // Jika edit dan datanya lengkap
        $projectName = $isEdit ? ($sheet['nama_project'] ?? '') : '';
        ?>

        <?php if (!empty($redirect_back)): ?>
            <input type="hidden" name="redirect_back" value="<?= esc($redirect_back) ?>">
        <?php endif; ?>




        <!-- Content -->
        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>
                    <button onclick="history.back()" style="background:none; border:none; cursor:pointer;">
                        <i class="las la-chevron-circle-left icon-big"></i>
                    </button>
                    Form Timesheet
                </h4>
                <?php if ($isEdit): ?>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        onclick="setDeleteUrl('<?= base_url('sheet/user/delete/' . $sheet['id_sheet']) ?>')">Delete Sheet</a>
                <?php endif ?>
            </div>


            <div class="mb-4">
                <div class="d-flex mb-2">
                    <div class="fw-semibold" style="min-width: 140px;">Consultant</div>
                    <div class="me-1">:</div>
                    <div class="fw-semibold"><?= esc($namaEmployee) ?></div>
                </div>
                <div class="d-flex mb-2">
                    <div class="fw-semibold" style="min-width: 140px;">Role</div>
                    <div class="me-1">:</div>
                    <div class="fw-semibold"><?= esc($judulRole) ?></div>
                </div>
                <div class="d-flex mb-2">
                    <div class="fw-semibold" style="min-width: 140px;">Project Name</div>
                    <div class="me-1">:</div>
                    <div class="fw-semibold">
                        <?= esc($projectName) ?>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <form method="post" action="<?= $formAction ?>">
                    <?php if (isset($redirect_back)): ?>
                        <input type="hidden" name="redirect_back" value="<?= $redirect_back ?>">
                    <?php endif ?>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date_sheet" placeholder="Enter date"
                                value="<?= $isEdit ? esc($sheet['date_sheet']) : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="hours" class="form-label">Minute</label>
                            <input type="text" class="form-control" name="hours_sheet" placeholder="Enter total minute"
                                value="<?= $isEdit ? esc($sheet['hours_sheet']) : '' ?>" required>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="activity" class="form-label">Activity</label>
                            <textarea class="form-control" name="activity" placeholder="Enter your activity" rows="4" required><?= $isEdit ? esc($sheet['activity']) : '' ?></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="result" class="form-label">Result</label>
                            <textarea class="form-control" name="result_path" placeholder="Enter the result/result link" rows="4" required><?= $isEdit ? esc($sheet['result_path']) : '' ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="id_project" class="form-label">Project</label>
                                <select name="id_project" class="form-control" required>
                                    <option value="">-- Select Project --</option>
                                    <?php foreach ($projects as $project): ?>
                                        <option value="<?= $project['id_project'] ?>" <?= $isEdit && $sheet['id_project'] == $project['id_project'] ? 'selected' : '' ?>>
                                            <?= esc($project['nama_project']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex justify-content-center">
                            <?php if ($isEdit): ?>
                                <a href="<?= base_url('sheet/user') ?>" class="btn-cancel">Cancel</a>
                            <?php endif ?>
                            <button type="submit" class="btn-submit"><?= $isEdit ? 'Save' : 'Add Now' ?></button>
                        </div>
                </form>
            </div>
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
        function setDeleteUrl(url) {
            document.getElementById('confirmDeleteForm').setAttribute('action', url);
        }
    </script>

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