<div class="container py-4">
    <h3 class="mb-4">Add New Employee</h3>
    <form action="<?= base_url('employee/store') ?>" method="post">
        <div class="mb-3">
            <label for="nama_employee" class="form-label">Name</label>
            <input type="text" class="form-control" name="nama_employee" required>
        </div>
        <div class="mb-3">
            <label for="alamat_employee" class="form-label">Address</label>
            <input type="text" class="form-control" name="alamat_employee" required>
        </div>
        <div class="mb-3">
            <label for="dob_employee" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob_employee" required>
        </div>
        <div class="mb-3">
            <label for="nohp_employee" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="nohp_employee" required>
        </div>
        <div class="mb-3">
            <label for="id_role" class="form-label">Role</label>
            <select name="id_role" class="form-select" required>
                <option value="">-- Select Role --</option>
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role['id_role'] ?>"><?= $role['judul_role'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col">
            <label for="status_employee" class="form-label">Status Employee</label>
            <select name="status_employee" class="form-control" required>
                <option value="">-- Pilih Status Employee --</option>
                <option value="1" <?= isset($employee) && $employee['status_employee'] == '1' ? 'selected' : '' ?>>Aktif</option>
                <option value="0" <?= isset($employee) && $employee['status_employee'] == '0' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username"
                value="<?= isset($employee) ? $employee['username'] : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password"
                value="<?= isset($employee) ? $employee['password'] : '' ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?= base_url('employee') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>