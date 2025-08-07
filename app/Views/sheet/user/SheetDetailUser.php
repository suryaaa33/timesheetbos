<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Timesheet</title>
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
                    <h4 class="mb-0">Detail Timesheet</h4>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="<?= base_url('sheet/user/create?project=' . $sheet['id_project'] . '&from=detail&sheet=' . $sheet['id_sheet']) ?>" class="btn btn-primary">
                            + Add New Activity
                        </a>
                    </div>

                </div>
                <div class="mb-4">
                    <div class="d-flex mb-2">
                        <div class="fw-semibold" style="min-width: 140px;">Consultant</div>
                        <div class="me-1">:</div>
                        <div class="fw-semibold"><?= esc($sheet['nama_employee']) ?></div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="fw-semibold" style="min-width: 140px;">Role</div>
                        <div class="me-1">:</div>
                        <div class="fw-semibold"><?= esc($sheet['judul_role']) ?></div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="fw-semibold" style="min-width: 140px;">Project Name</div>
                        <div class="me-1">:</div>
                        <div class="fw-semibold"><?= esc($sheet['nama_project']) ?></div>
                    </div>
                </div>


                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>DATE</th>
                                <th>MINUTES</th>
                                <th>ACTIVITY</th>
                                <th>RESULT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activities as $a): ?>
                                <tr>
                                    <td><?= esc($a['date_sheet']) ?></td>
                                    <td><?= esc($a['hours_sheet']) ?></td>
                                    <td class="address-column"><?= esc($a['activity']) ?></td>
                                    <td class="address-column"><?= esc($a['result_path']) ?></td>
                                    <td>
                                        <a href="<?= base_url('sheet/user/edit/' . $a['id_sheet']) ?>" class="btn btn-light-icon">
                                            <i class="las la-edit icon-big"></i>
                                        </a>
                                        <a href="#" class="btn btn-light-icon" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                            onclick="setDeleteUrl('<?= base_url('sheet/user/delete/' . $a['id_sheet']) ?>')">
                                            <i class="las la-trash icon-big"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
                    <p class="fs-5 mb-4">Are you sure want to delete this sheet?</p>
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