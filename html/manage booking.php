<?php
session_start();
include('db.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Improved query to get user names and destination names
$sql = "SELECT 
            bookings.booking_id, 
            bookings.datetime, 
            bookings.features, 
            users.first_name AS user_name, 
            destination.destination AS destination_name 
        FROM bookings
        LEFT JOIN users ON bookings.user_id = users.user_id
        LEFT JOIN destination ON bookings.booking_id = destination.id";

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
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
        <h1>Manage Bookings</h1>
        <table class="table table-striped table-bordered table-hover mt-4">
    <thead class="table-dark">
        <tr>
            <th>Booking ID</th>
            <th>User</th>
            <th>Destination</th>
            <th>Date</th>
            <th>Features</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['booking_id']; ?></td>
            <td><?php echo htmlspecialchars($row['user_name'] ?? 'Unknown User'); ?></td>
            <td><?php echo htmlspecialchars($row['destination_name'] ?? 'Unknown Destination'); ?></td>
            <td><?php echo $row['datetime']; ?></td>
            <td><?php echo htmlspecialchars($row['features']); ?></td>
            <td>
                <a href="edit_booking.php?id=<?php echo $row['booking_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="delete_booking.php?id=<?php echo $row['booking_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

    </div>
</body>
</html>
