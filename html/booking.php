<?php
session_start();
echo( $_SESSION['user']);


include('db.php');

if(true) {
// if (isset($_POST['user_id']) && isset($_POST['package_id']) && isset($_POST['visitor']) && isset($_POST['people']) && isset($_POST['datetime']) && isset($_POST['features'])) {



$userid = $_SESSION['user'];
print("This is the user id:  $userid");
// $packageId = $_POST['package_id'];
$visitor = $_POST['visitor'];
$people = $_POST['people'];
$datetime = $_POST['datetime'];
$features = $_POST['features'];


// Calculate total price based on features and people
$featurePrices = [
    "beautiful beaches" => 500,
    "historical sites" => 400,
    "mountains" => 600,
    "wildlife" => 40,
    "full tour" => 1500,
    "beautiful beaches/historical sites" => 900,
    "historical sites/wildlife" => 800,
    "beautiful beaches/wildlife" => 700,
    "mountains/beautiful beaches" => 1100,
    "mountains/historical sites" => 1000
];

$pricePerPerson = $featurePrices[$features] ?? 0; // Use null coalescing operator to avoid errors
$totalPrice = $pricePerPerson * $people;

$sql = "INSERT INTO bookings ( user_id, visitor, people, total_price, datetime, features) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);

if ($stmt) {
    $stmt->bind_param("isidss",$userid, $visitor, $people, $totalPrice, $datetime, $features);

    if ($stmt->execute()) {
        echo "Booking details saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $con->error;
}

} else {
echo "Error: Data not received from the form.";
}

$con->close();

?>