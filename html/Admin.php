<?php
session_start();
include('db.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Fetch admin details
$admin_id = $_SESSION['admin'];
$sql = "SELECT first_name, last_name, email, profile_picture, created_at FROM admins WHERE admin_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $profile_picture, $created_at);
$stmt->fetch();
$stmt->close();

// Fetch dashboard stats
$total_users = $con->query("SELECT COUNT(*) FROM users")->fetch_row()[0];
$total_destinations = $con->query("SELECT COUNT(*) FROM destinations")->fetch_row()[0];
$total_bookings = $con->query("SELECT COUNT(*) FROM bookings")->fetch_row()[0];
$total_revenue = $con->query("SELECT SUM( payment_amount) FROM payments")->fetch_row()[0] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="destinations.php">Destinations</a></li>
            <li><a href="manage booking.php">Bookings</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="cards">
            <div class="card">Total Users: <?php echo $total_users; ?></div>
            <div class="card">Total Destinations: <?php echo $total_destinations; ?></div>
            <div class="card">Bookings: <?php echo $total_bookings; ?></div>
            <div class="card">Revenue: $<?php echo number_format($total_revenue, 2); ?></div>
        </div>
        
        <section class="analytics">
            <h2>Booking Trends</h2>
            <canvas id="bookingChart"></canvas>
        </section>
    </div>
    
    <section class="profile">
        <div class="profile-container">
            <img src="uploads/<?php echo $profile_picture ? $profile_picture : 'default.jpg'; ?>" alt="Profile Picture">
            <div class="profile-details">
                <h2><?php echo $first_name . ' ' . $last_name; ?></h2>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Account Created:</strong> <?php echo $created_at; ?></p>
            </div>
        </div>
    </section>
    
    <section class="update-profile">
        <a href="edit_profile.php"><button>Update Profile</button></a>
    </section>

    <script>
        
     // This part will dynamically load the booking trend chart from the server-side
fetch('fetch_booking_data.php')
    .then(response => response.json())
    .then(data => {
        var ctx = document.getElementById('bookingChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Bookings',
                    data: data.values,
                    borderColor: 'rgb(52, 152, 219)',
                    backgroundColor: 'rgba(52, 152, 219, 0.2)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Bookings'
                        }
                    }
                }
            }
        });
    });

    </script>
</body>
</html>
