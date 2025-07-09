<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'employees':
        header("Location: views/employees/index.php");
        exit;
    case 'customers':
        header("Location: views/customers/index.php");
        exit;
    case 'home':
    default:
        include "views/layouts/header.php";
        ?>

        <div class="text-center mt-5 mb-5">
            <img src="https://cdn-icons-png.flaticon.com/512/888/888879.png" width="100" alt="CRUD Icon" class="mb-3">
            <h3 class="mb-2">Selamat Datang di Aplikasi CRUD Buatan Imam Ikhlasul Jihad</h3>
            <p class="lead">Kelola data <strong>Employees</strong> dan <strong>Customers</strong></p>
        </div>

        <?php
        include "views/layouts/footer.php";
        break;
}
