<?php
require_once '../../controllers/CustomerController.php';
require_once '../layouts/header.php';

$controller = new CustomerController();
$salesReps = $controller->salesReps();

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

<h4 class="mb-3">Tambah Customer</h4>

<form method="post">
    <div class="mb-3">
        <label>Customer Number</label>
        <input type="number" name="customerNumber" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Customer Name</label>
        <input type="text" name="customerName" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Contact First Name</label>
        <input type="text" name="contactFirstName" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Contact Last Name</label>
        <input type="text" name="contactLastName" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="addressLine1" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>City</label>
        <input type="text" name="city" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Postal Code</label>
        <input type="text" name="postalCode" class="form-control">
    </div>
    <div class="mb-3">
        <label>Country</label>
        <input type="text" name="country" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Sales Representative</label>
        <select name="salesRepEmployeeNumber" class="form-select">
            <option value="">- Pilih Sales Rep -</option>
            <?php foreach ($salesReps as $rep): ?>
                <option value="<?= $rep['employeeNumber'] ?>">
                    <?= $rep['firstName'] . ' ' . $rep['lastName'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php require_once '../layouts/footer.php'; ?>
