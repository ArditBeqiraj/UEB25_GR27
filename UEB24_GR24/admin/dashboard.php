<?php

session_start();
include("db.php");
include("functions.php");
require 'auth.php';

$user_query = "SELECT COUNT(*) AS total_users FROM users";
$result = $conn->query($user_query);
$row = $result->fetch_assoc();
$total_user = $row['total_users'];

$user_query = "SELECT COUNT(*) AS total_planes FROM airplanes";
$result = $conn->query($user_query);
$row = $result->fetch_assoc();
$total_planes = $row['total_planes'];

$today = date('Y-m-d');
$sql = "SELECT COUNT(*) AS total_rents FROM rent WHERE start_date <= '$today' AND end_date >= '$today'";
$result_rent = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result_rent);
$totalRents = $row['total_rents'];

$sql = "SELECT name, price FROM airplanes ORDER BY id DESC LIMIT 3";
$result_plane = mysqli_query($conn, $sql);

$sql = "SELECT email FROM users WHERE role = 'client' LIMIT 3";
$result_user = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Rent a Plane</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #002244;
            color: white;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #1e3a66;
        }

        .header {
            background-color: #ffffff;
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }

        .content {
            padding: 20px;
        }

        .card-title {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar d-flex flex-column">
                <h4 class="text-center my-4">AeroSales</h4>
                <a href="dashboard.php">Dashboard</a>
                <a href="./users/index.php">Manage Users</a>
                <a href="./airplanes/index.php">Manage Planes</a>
                <a href="./rental/index.php">Rentals Overview</a>
                <a href="./sales/index.php">Sales Overview</a>
                <a href="./buy/index.php">Buy Overview</a>
                <a href="./logout.php">Logout</a>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto content">
                <div class="header">
                    <h2>Welcome, Admin 👋</h2>
                    <p>System statistics and controls at a glance.</p>
                </div>

                <!-- Cards with Overview -->
                <div class="row my-4">
                    <div class="col-md-3">
                        <div class="card text-bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text"><?= $total_user ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Planes Listed</h5>
                                <p class="card-text"><?= $total_planes ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Active Rentals</h5>

                                <p class="card-text"><?= $totalRents ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-bg-danger">
                            <div class="card-body">
                                <h5 class="card-title">Completed Sales</h5>
                                <p class="card-text">18</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tables or Actions -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recent User Signups</h5>
                                <ul class="list-group">
                                    <?php while ($row = mysqli_fetch_assoc($result_user)) : ?>
                                        <li class="list-group-item"><?= htmlspecialchars($row['email']); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Latest Plane Listings</h5>
                                <ul class="list-group">
                                    <?php while ($row = mysqli_fetch_assoc($result_plane)) : ?>
                                        <li class="list-group-item">
                                            <?= htmlspecialchars($row['name']) ?> | €<?= number_format($row['price'], 2) ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>