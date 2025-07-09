<?php
require_once '../../controllers/CustomerController.php';
require_once '../layouts/header.php';

$controller = new CustomerController();

$currentPage = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
$perPage = 10;

$total = $controller->count();
$customers = $controller->indexPaginated($currentPage, $perPage);
$totalPages = ceil($total / $perPage);
?>
<?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
    <?php
        $aksi = $_GET['aksi'] ?? 'berhasil';
        $pesan = match($aksi) {
            'tambah' => 'Data berhasil ditambahkan.',
            'edit' => 'Data berhasil diperbarui.',
            'hapus' => 'Data berhasil dihapus.',
            default => 'Operasi berhasil.'
        };
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ <?= $pesan ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>


<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Customers</h4>
    <a href="create.php" class="btn btn-success">+ Tambah Customer</a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Kontak</th>
            <th>Telepon</th>
            <th>Kota</th>
            <th>Negara</th>
            <th>Sales Rep</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($customers) > 0): ?>
            <?php foreach ($customers as $i => $c): ?>
            <tr>
                <td><?= ($i + 1) + ($currentPage - 1) * $perPage ?></td>
                <td><?= htmlspecialchars($c['customerName']) ?></td>
                <td><?= htmlspecialchars($c['contactFirstName'] . ' ' . $c['contactLastName']) ?></td>
                <td><?= htmlspecialchars($c['phone']) ?></td>
                <td><?= htmlspecialchars($c['city']) ?></td>
                <td><?= htmlspecialchars($c['country']) ?></td>
                <td><?= $c['salesRep'] ?: '-' ?></td>
                <td>
                    <a href="edit.php?id=<?= $c['customerNumber'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $c['customerNumber'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center">Belum ada data.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Pagination -->
<nav>
    <ul class="pagination justify-content-center">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?hal=<?= $currentPage - 1 ?>">&laquo; Prev</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
                <a class="page-link" href="?hal=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?hal=<?= $currentPage + 1 ?>">Next &raquo;</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<?php require_once '../layouts/footer.php'; ?>
