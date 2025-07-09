<?php
require_once '../../controllers/EmployeeController.php';
require_once '../layouts/header.php';

$controller = new EmployeeController();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<div class='alert alert-danger'>ID tidak ditemukan.</div>";
    require_once '../layouts/footer.php';
    exit;
}

$employee = $controller->edit($id);
if (!$employee) {
    echo "<div class='alert alert-warning'>Data employee tidak ditemukan.</div>";
    require_once '../layouts/footer.php';
    exit;
}

// Proses update saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = $controller->update($id, $_POST);
    if ($success) {
        header("Location: index.php?status=sukses&aksi=edit");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal update data.</div>";
    }
}
?>

<h4 class="mb-3">Edit Employee</h4>

<form method="post">
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="firstName" class="form-control" value="<?= htmlspecialchars($employee['firstName']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="lastName" class="form-control" value="<?= htmlspecialchars($employee['lastName']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Extension</label>
        <input type="text" name="extension" class="form-control" value="<?= htmlspecialchars($employee['extension']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($employee['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Office Code</label>
        <input type="text" name="officeCode" class="form-control" value="<?= htmlspecialchars($employee['officeCode']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Reports To (optional)</label>
        <input type="number" name="reportsTo" class="form-control" value="<?= htmlspecialchars($employee['reportsTo']) ?>">
    </div>
    <div class="mb-3">
        <label>Job Title</label>
        <input type="text" name="jobTitle" class="form-control" value="<?= htmlspecialchars($employee['jobTitle']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php require_once '../layouts/footer.php'; ?>
