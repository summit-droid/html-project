<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
            color: white;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-size: cover;
            background-position: center;
            animation: slideBackground 15s infinite alternate;
        }

        @keyframes slideBackground {
            0% { background-image: url('image/marine.jpg'); }
            50% { background-image: url('image/safrica.jpg'); }
            100% { background-image: url('image/camp.jpg'); }
            150% { background-image: url('image/mount.jpg'); }
            200% { background-image: url('image/other.jpg'); }
            250% { background-image: url('image/wild.jpg'); }
        }

        .container {
            background:none;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        input[type="password"] {
            background: #fff;
        }

        input[type="submit"] {
            background: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <h2>Change Password</h2>

        <?php if (isset($error)): ?>
            <p style="color: red;"> <?php echo $error; ?> </p>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <p style="color: green;"> <?php echo $success; ?> </p>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="password" name="currentPassword" placeholder="Current Password" required><br>
            <input type="password" name="newPassword" placeholder="New Password" required><br>
            <input type="password" name="confirmPassword" placeholder="Confirm New Password" required><br>
            <input type="submit" value="Change Password">
        </form>
    </div>
</body>
</html>
