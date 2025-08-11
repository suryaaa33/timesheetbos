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
    <!-- <a href="<?= base_url('roledetail') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
        <i class="las la-server"></i>
        <span class="ms-2">Role Detail</span>
    </a> -->
    <!-- <a href="<?= base_url('menu') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
        <i class="las la-list"></i>
        <span class="ms-2">Menu</span>
    </a> -->
    <a href="<?= base_url('sheet') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
        <i class="las la-calendar-alt"></i>
        <span class="ms-2">Time Sheet</span>
    </a>
    <hr />
    <a href="#" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal"
        class="menu-item d-flex align-items-center text-decoration-none text-dark">
        <i class="las la-power-off"></i>
        <span class="ms-2">Logout</span>
</a>
</div>