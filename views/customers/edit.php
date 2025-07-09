<?php
require_once '../../controllers/CustomerController.php';
require_once '../layouts/header.php';

$controller = new CustomerController();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<div class='alert alert-danger'>ID tidak ditemukan.</div>";
    require_once '../layouts/footer.php';
    exit;
}

$customer = $controller->edit($id);
if (!$customer) {
    echo "<div class='alert alert-warning'>Data customer tidak ditemukan.</div>";
    require_once '../layouts/footer.php';
    exit;
}

$salesReps = $controller->salesReps();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = $controller->update($id, $_POST);
    if ($success) {
        header("Location: index.php?status=sukses&aksi=edit");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupdate data.</div>";
    }
}
?>

<h4 class="mb-3">Edit Customer</h4>

<form method="post">
    <div class="mb-3">
        <label>Customer Name</label>
        <input type="text" name="customerName" class="form-control" value="<?= htmlspecialchars($customer['customerName']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Contact First Name</label>
        <input type="text" name="contactFirstName" class="form-control" value="<?= htmlspecialchars($customer['contactFirstName']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Contact Last Name</label>
        <input type="text" name="contactLastName" class="form-control" value="<?= htmlspecialchars($customer['contactLastName']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($customer['phone']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="addressLine1" class="form-control" value="<?= htmlspecialchars($customer['addressLine1']) ?>" required>
    </div>
    <div class="mb-3">
        <label>City</label>
        <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($customer['city']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Postal Code</label>
        <input type="text" name="postalCode" class="form-control" value="<?= htmlspecialchars($customer['postalCode']) ?>">
    </div>
    <div class="mb-3">
        <label>Country</label>
        <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($customer['country']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Sales Representative</label>
        <select name="salesRepEmployeeNumber" class="form-select">
            <option value="">- Pilih Sales Rep -</option>
            <?php foreach ($salesReps as $rep): ?>
                <option value="<?= $rep['employeeNumber'] ?>"
                    <?= $customer['salesRepEmployeeNumber'] == $rep['employeeNumber'] ? 'selected' : '' ?>>
                    <?= $rep['firstName'] . ' ' . $rep['lastName'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php require_once '../layouts/footer.php'; ?>
