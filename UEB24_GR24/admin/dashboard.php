<?php

session_start();
include("db.php");
include("functions.php");
require 'auth.php';

// $user_data = check_login($conn);
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
                <h4 class="text-center my-4">🛠 Admin Panel</h4>
                <a href="#">Dashboard</a>
                <a href="#">Manage Users</a>
                <a href="#">Manage Planes</a>
                <a href="#">Rentals Overview</a>
                <a href="#">Sales Overview</a>
                <a href="#">Messages</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
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
                                <p class="card-text">120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Planes Listed</h5>
                                <p class="card-text">54</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Active Rentals</h5>
                                <p class="card-text">23</p>
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
                                    <li class="list-group-item">user1@example.com</li>
                                    <li class="list-group-item">pilot2@example.com</li>
                                    <li class="list-group-item">owner3@example.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Latest Plane Listings</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">Cessna 172 | €80,000</li>
                                    <li class="list-group-item">Boeing 747 | €3,000,000</li>
                                    <li class="list-group-item">Embraer Phenom 300 | €2,500,000</li>
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