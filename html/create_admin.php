<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? 'Admin';
    $last_name = $_POST['last_name'] ?? 'User';
    $email = $_POST['email'] ?? 'admin@example.com';
    $password = $_POST['password'] ?? 'admin123';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the admin
    $sql = "INSERT INTO admins (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: login.php"); // Redirect to login page
        exit();
    
    } else {
        echo "Error: " . $con->error;
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Create Admin Account</h2>
        <form method="POST">
            <label>First Name:</label>
            <input type="text" name="first_name" required>

            <label>Last Name:</label>
            <input type="text" name="last_name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Create Admin</button>
        </form>
    </div>
</body>
</html>
