<?php
// search_results.php

$destination = isset($_GET['destination']) ? $_GET['destination'] : '';
$tourType = isset($_GET['tourType']) ? $_GET['tourType'] : '';
$checkIn = isset($_GET['checkIn']) ? $_GET['checkIn'] : '';
$checkOut = isset($_GET['checkOut']) ? $_GET['checkOut'] : '';

include('db.php');

if ($con->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $con->connect_error)));
}

$sql = "SELECT * FROM destination WHERE destination LIKE '%$destination%'";

if (!empty($tourType)) {
    $sql .= " AND tourType = '$tourType'";
}
if (!empty($checkIn)) {
    $sql .= " AND checkIn >= '$checkIn'";
}
if (!empty($checkOut)) {
    $sql .= " AND checkOut <= '$checkOut'";
}

$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(array("available" => true, "redirect" => true)); // Indicate availability and redirect
} else {
    echo json_encode(array("available" => false, "redirect" => false)); // Indicate unavailability and no redirect
}

if ($con !== null) {
    $con->close();
}
?>