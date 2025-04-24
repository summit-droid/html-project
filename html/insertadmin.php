<?php
include('db.php');

$first_name = "kane";
$last_name = "shiro";
$email = "kane@gmail.com";
$plain_password = "1234";
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

$stmt = $con->prepare("INSERT INTO admins (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

if ($stmt->execute()) {
    echo "Admin inserted successfully.";
} else {
    echo "Error inserting admin: " . $stmt->error;
}
?>
