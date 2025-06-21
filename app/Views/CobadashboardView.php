<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
        }

        .sidebar .logo {
            font-weight: bold;
            color: #4ad991;
        }

        .sidebar .menu-item {
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
        }

        .sidebar .menu-item:hover,
        .sidebar .menu-item.active {
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .main-content {
            padding: 2rem;
            flex-grow: 1;
        }

        .summary-card {
            border: none;
            border-radius: 8px;
        }

        .summary-card .icon-circle {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin-right: 10px;
        }

        .summary-card button {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <div class="text-center mb-4 logo">
                <h4 class="m-0">Bri<span style="color:#000">Sheet</span></h4>
            </div>
            <div class="menu-item active">📊 Dashboard</div>
            <div class="menu-item">👥 Employee</div>
            <div class="menu-item d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" width="20" height="20" class="me-2" />
                <span>Client</span>
            </div>

            <div class="menu-item">📁 Project</div>
            <div class="menu-item">🛡️ Role</div>
            <div class="menu-item">🔍 Role Detail</div>
            <div class="menu-item">📋 Menu</div>
            <div class="menu-item">🕒 Time Sheet</div>
            <hr />
            <div class="menu-item">⚙️ Settings</div>
            <div class="menu-item">🚪 Logout</div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Dashboard</h2>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <div class="fw-bold">Kaithlin</div>
                        <div class="text-muted small">Master</div>
                    </div>
                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/man-438081-960-720.png" class="rounded-circle" width="40" height="40" alt="Profile" />
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="row g-4">
                <!-- Summary Box Template -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card summary-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle" style="background-color:#4ad991;">
                                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/employee.png" width="30" />
                                </div>
                                <div>
                                    <div>Total Employee</div>
                                    <h4>72</h4>
                                </div>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color:#4ad991;">➕ Add Employee</button>
                        </div>
                    </div>
                </div>

                <!-- Client -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card summary-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle" style="background-color:#6cc3ff;">
                                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/client.png" width="30" />
                                </div>
                                <div>
                                    <div>Total Client</div>
                                    <h4>50</h4>
                                </div>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color:#6cc3ff;">➕ Add Client</button>
                        </div>
                    </div>
                </div>

                <!-- project -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card summary-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle" style="background-color:#6cc3ff;">
                                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/project.png" width="30" />
                                </div>
                                <div>
                                    <div>Total project</div>
                                    <h4>50</h4>
                                </div>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color:#6cc3ff;">➕ Add project</button>
                        </div>
                    </div>
                </div>

                <!-- menu -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card summary-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle" style="background-color:#6cc3ff;">
                                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/menu.png" width="30" />
                                </div>
                                <div>
                                    <div>Total menu</div>
                                    <h4>50</h4>
                                </div>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color:#6cc3ff;">➕ Add menu</button>
                        </div>
                    </div>
                </div>

                <!-- role -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card summary-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle" style="background-color:#6cc3ff;">
                                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/role.png" width="30" />
                                </div>
                                <div>
                                    <div>Total role</div>
                                    <h4>50</h4>
                                </div>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color:#6cc3ff;">➕ Add role</button>
                        </div>
                    </div>
                </div>

                <!-- roledetail -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card summary-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle" style="background-color:#6cc3ff;">
                                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/roledetail.png" width="30" />
                                </div>
                                <div>
                                    <div>Total roledetail</div>
                                    <h4>50</h4>
                                </div>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color:#6cc3ff;">➕ Add roledetail</button>
                        </div>
                    </div>
                </div>

                <!-- sheet -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card summary-card shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle" style="background-color:#6cc3ff;">
                                    <img src="https://c.animaapp.com/mby0ww3yUaPjDH/img/sheet.png" width="30" />
                                </div>
                                <div>
                                    <div>Total sheet</div>
                                    <h4>50</h4>
                                </div>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color:#6cc3ff;">➕ Add sheet</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>