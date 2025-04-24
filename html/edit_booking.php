<?php
session_start();
include('db.php');

// Redirect if not admin
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

$booking_id = $_GET['id'] ?? null;

if ($booking_id) {
    // Fetch booking data
    $stmt = $con->prepare("SELECT * FROM bookings WHERE booking_id = ?");
    $stmt->bind_param('i', $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datetime = $_POST['datetime'];
        $features = $_POST['features'];

        $update = $con->prepare("UPDATE bookings SET datetime = ?, features = ? WHERE booking_id = ?");
        $update->bind_param('ssi', $datetime, $features, $booking_id);
        $update->execute();

        header("Location: manage booking.php");
        exit();
    }
} else {
    echo "Booking ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Booking</title></head>
<body>
    <h2>Edit Booking #<?php echo $booking_id; ?></h2>
    <form method="POST">
        <label>Date & Time:</label><br>
        <input type="datetime-local" name="datetime" value="<?php echo date('Y-m-d\TH:i', strtotime($booking['datetime'])); ?>"><br><br>
        
        <label>Features:</label><br>
        <input type="text" name="features" value="<?php echo htmlspecialchars($booking['features']); ?>"><br><br>
        
        <input type="submit" value="Update Booking">
    </form>
    <p><a href="manage booking.php">Back to Bookings</a></p>
</body>
</html>
