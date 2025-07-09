<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<!-- Navbar Elegan -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">SalesOrderApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= ($_GET['page'] ?? 'home') === 'home' ? 'active' : '' ?>" href="http://salesorder.test/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($_GET['page'] ?? '') === 'employees' ? 'active' : '' ?>" href="http://salesorder.test/views/employees/index.php">Employees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($_GET['page'] ?? '') === 'customers' ? 'active' : '' ?>" href="http://salesorder.test/views/customers/index.php">Customers</a>
        </li>
      </ul>

      <button class="btn btn-outline-light" onclick="toggleDarkMode()">🌓 Mode</button>
    </div>
  </div>
</nav>

<div class="container mt-4">
