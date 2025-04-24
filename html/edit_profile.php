<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the user data from the database
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get new profile data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);

    // Handle profile picture upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $file_name = $_FILES['profile_picture']['name'];
        $file_tmp = $_FILES['profile_picture']['tmp_name'];
        $file_path = "uploads/" . basename($file_name);

        // Move the uploaded file to the server
        if (move_uploaded_file($file_tmp, $file_path)) {
            $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, profile_picture = ? WHERE user_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssi", $first_name, $last_name, $email, $file_name, $user_id);
        }
    } else {
        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssi", $first_name, $last_name, $email, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email'] = $email;
        if (isset($file_name)) {
            $_SESSION['profile_picture'] = $file_name;
        }

        header("Location: profile.php"); // Redirect to profile page after update
        exit();
    } else {
        echo "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>

<h2>Edit Profile</h2>

<form action="edit_profile.php" method="POST" enctype="multipart/form-data">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required><br><br>
    
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required><br><br>
    
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
    
    <label for="profile_picture">Profile Picture</label>
    <input type="file" name="profile_picture"><br><br>
    
    <button type="submit">Update Profile</button>
</form>

</body>
</html>
