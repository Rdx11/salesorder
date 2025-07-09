<?php
require_once '../../controllers/CustomerController.php';

$controller = new CustomerController();
$id = $_GET['id'] ?? null;

if ($id) {
    $success = $controller->delete($id);
    if ($success) {
        header("Location: index.php?status=sukses&aksi=hapus");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>ID tidak ditemukan.</div>";
}
?>
