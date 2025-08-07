<!-- Sidebar -->
<div class="sidebar p-3">
    <div class="text-center mb-4 logo">
        <h4 class="m-0">Bri<span style="color:#000">Sheet</span></h4>
    </div>
    <a href="<?= base_url('dashboarduser') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
        <i class="las la-tachometer-alt"></i>
        <span class="ms-2">Dashboard</span>
    </a>
    <a href="<?= base_url('sheet/user') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
        <i class="las la-calendar-alt"></i>
        <span class="ms-2">Time Sheet</span>
    </a>
    <a href="<?= base_url('project/user') ?>" class="menu-item d-flex align-items-center text-decoration-none text-dark">
        <i class="las la-cube"></i>
        <span class="ms-2">Project Assigned</span>
    </a>
    <hr />
    <a href="#" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal"
    class="menu-item d-flex align-items-center text-decoration-none text-dark">
    <i class="las la-power-off"></i>
    <span class="ms-2">Logout</span>
</a>

</div>


