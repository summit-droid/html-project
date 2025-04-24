<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

$booking_id = $_GET['id'] ?? null;

if ($booking_id) {
    $stmt = $con->prepare("DELETE FROM bookings WHERE booking_id = ?");
    $stmt->bind_param('i', $booking_id);
    $stmt->execute();
}

header("Location: manage booking.php");
exit();
?>
