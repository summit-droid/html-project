<?php
session_start();
include('db.php');

// Sanitize input
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

// Check if the email belongs to an admin
$stmt_admin = $con->prepare('SELECT * FROM admins WHERE email = ?');
$stmt_admin->bind_param('s', $email);
$stmt_admin->execute();
$result_admin = $stmt_admin->get_result();

if ($result_admin->num_rows > 0) {
    // Admin found
    $admin = $result_admin->fetch_assoc();

    // Verify hashed password
    if (password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin['admin_id'];  // Set session for admin
        header("Location: Admin.php");  // Redirect to admin dashboard
        exit();
    } else {
        echo "<script>alert('Invalid admin credentials.'); window.location.href='login.php';</script>";
    }

    $stmt_admin->close();
} else {
    // Check if the email belongs to a regular user
    $stmt_user = $con->prepare('SELECT * FROM users WHERE email = ?');
    $stmt_user->bind_param('s', $email);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows > 0) {
        // User found
        $user = $result_user->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['user_id'];  // Set session for user
            header("Location: summit.php");  // Redirect to user dashboard
            exit();
        } else {
            echo "<script>alert('Invalid user credentials.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('No user or admin found with that email.'); window.location.href='login.php';</script>";
    }

    $stmt_user->close();
}
?>
