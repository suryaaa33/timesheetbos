<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Project Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboardTable.css') ?>" />
</head>

<body>
    <div class="d-flex">
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
                <!-- Baris atas: judul dan tombol add -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">Project List</h4>
                    <a href="<?= base_url('project/create') ?>" class="btn btn-primary">+ Add Project</a>
                </div>

                <!-- Baris kedua: dropdown sort -->
                <form method="get" action="<?= base_url('project') ?>" id="filterForm" class="filter-bar">
                    <!-- Start Date -->
                    <div class="filter-item">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date"
                            value="<?= esc($start_date) ?>" class="form-control auto-submit">
                    </div>

                    <!-- End Date -->
                    <div class="filter-item">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date"
                            value="<?= esc($end_date) ?>" class="form-control auto-submit">
                    </div>

                    <!-- Client -->
                    <div class="filter-item">
                        <label for="client_id">Client</label>
                        <select name="client_id" id="client_id" class="form-select auto-submit">
                            <option value="">-- Semua Client --</option>
                            <?php foreach ($clients as $c): ?>
                                <option value="<?= $c['id_client'] ?>"
                                    <?= ($client_id == $c['id_client']) ? 'selected' : '' ?>>
                                    <?= esc($c['nama_client']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="filter-item">
                        <label for="status_project">Status Project</label>
                        <select name="status_project" id="status_project" class="form-select auto-submit">
                            <option value="">-- Semua Status --</option>
                            <option value="0" <?= ($status_project === '0') ? 'selected' : '' ?>>On Process</option>
                            <option value="1" <?= ($status_project === '1') ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </div>

                    <!-- Reset Button -->
                    <div class="filter-item">
                        <label>&nbsp;</label>
                        <a href="<?= base_url('project') ?>" class="btn reset-btn">
                            <i class="las la-undo-alt"></i> Reset
                        </a>
                    </div>

                </form>


                <div class="table-container table-responsive bg-white shadow-sm">
                    <table class="table align-middle mb-0 custom-table">
                        <thead class="table-header">
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>DEADLINE</th>
                                <th>CLIENT</th>
                                <th>PM</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $i => $e): ?>
                                <tr>
                                    <td><?= $e['id_project'] ?></td>
                                    <td><?= esc($e['nama_project']) ?></td>
                                    <td><?= esc($e['startdate_project']) ?></td>
                                    <td><?= esc($e['enddate_project']) ?></td>
                                    <td><?= esc($e['deadline_project']) ?></td>
                                    <td><?= esc($e['nama_client']) ?></td>
                                    <td><?= esc($e['nama_employee']) ?></td>
                                    <td>
                                        <?= $e['status_project'] == '1' ? '<span class="badge bg-success">Completed</span>' : '<span class="badge bg-secondary">On-Process</span>' ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('project/edit/' . $e['id_project']) ?>" class="btn btn-light-icon"><i class="las la-edit icon-big"></i></a>
                                        <a href="#" class="btn btn-light-icon" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                            onclick="setDeleteUrl('<?= base_url('project/delete/' . $e['id_project']) ?>')">
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

    <script>
        document.querySelectorAll('.auto-submit').forEach(function(el) {
            el.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    </script>
</body>

</html>