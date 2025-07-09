<?php
require_once '../../controllers/EmployeeController.php';
require_once '../layouts/header.php';

$controller = new EmployeeController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = $controller->store($_POST);
    if ($success) {
        header("Location: index.php?status=sukses&aksi=tambah");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan data.</div>";
    }
}
?>

<h4 class="mb-3">Tambah Employee</h4>

<form method="post">
    <div class="mb-3">
        <label>Employee Number</label>
        <input type="number" name="employeeNumber" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="firstName" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="lastName" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Extension</label>
        <input type="text" name="extension" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Office Code</label>
        <input type="text" name="officeCode" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Reports To (optional)</label>
        <input type="number" name="reportsTo" class="form-control">
    </div>
    <div class="mb-3">
        <label>Job Title</label>
        <input type="text" name="jobTitle" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php require_once '../layouts/footer.php'; ?>
