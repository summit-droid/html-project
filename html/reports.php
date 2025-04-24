<?php
session_start();
include('db.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Placeholder for reports
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="destinations.php">Destinations</a></li>
            <li><a href="bookings.php">Bookings</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Reports</h1>
        <p>Coming soon...!</p>
    </div>
</body>
</html>
