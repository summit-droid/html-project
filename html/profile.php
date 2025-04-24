<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch the user information from the session
$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$profile_picture = $_SESSION['profile_picture'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        .profile {
            text-align: center;
            padding: 2rem;
        }
        .profile img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
        .profile h1 {
            margin-top: 1rem;
        }
        .profile p {
            margin-top: 0.5rem;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

<div class="profile">
    <!-- Display the user's profile picture -->
    <?php if ($profile_picture): ?>
        <img src="uploads/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture">
    <?php else: ?>
        <img src="default-profile.png" alt="Default Profile Picture">
    <?php endif; ?>

    <!-- Display the user's name and email -->
    <h1>Welcome, <?php echo htmlspecialchars($first_name . ' ' . $last_name); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>

    <!-- Links to Edit Profile or Logout -->
    <a href="edit_profile.php">Edit Profile</a> | <a href="logout.php">Logout</a>
</div>

</body>
</html>
