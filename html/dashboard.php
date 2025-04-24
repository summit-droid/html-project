<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .slideshow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            animation: slideShow 15s infinite alternate;
            background-size: cover;
            background-position: center;
        }

        @keyframes slideShow {
            0% { background-image: url('image/marine.jpg'); }
            50% { background-image: url('image/safrica.jpg'); }
            100% { background-image: url('image/camp.jpg'); }
            150% { background-image: url('image/mount.jpg'); }
            200% { background-image: url('image/other.jpg'); }
            250% { background-image: url('image/wild.jpg'); }
        }

        .dashboard-container {
            width: 80%;
            max-width: 800px;
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 30px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .dashboard-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .dashboard-item:hover {
            transform: translateY(-5px);
        }

        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .form-container {
            display: none;
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .form-container h3 {
            color: #3498db;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #ecf0f1;
        }

        .form-container input[type="password"],
        .form-container input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
        }

        .form-container input[type="submit"] {
            background-color: #3498db;
            border: none;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
    <script>
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="slideshow"></div>

    <div class="dashboard-container">
        <h2>User Dashboard</h2>

        <div class="dashboard-grid">
            <div class="dashboard-item">
                <h3>Book Now</h3>
                <p>Explore and book your next adventure.</p>
                <a href="order.php" class="button">Book Now</a>
            </div>

            <div class="dashboard-item">
                <h3>Change Password</h3>
                <p>Update your account password for security.</p>
                <button class="button" onclick="toggleForm('changePasswordForm')">Change Password</button>
            </div>

            <div class="dashboard-item">
                <h3>Logout</h3>
                <p>Securely log out of your account.</p>
                <button class="button" onclick="toggleForm('logoutForm')">Logout</button>
            </div>
        </div>

        <div id="changePasswordForm" class="form-container">
            <h3>Change Password</h3>
            <form action="change_password.php" method="POST">
                <label for="currentPassword">Current Password:</label>
                <input type="password" id="currentPassword" name="currentPassword" required><br><br>
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required><br><br>
                <input type="submit" value="Change Password">
            </form>
        </div>

        <div id="logoutForm" class="form-container">
            <h3>Logout</h3>
            <p>Are you sure you want to logout?</p>
            <form action="logout.php" method="POST">
                <input type="submit" value="Logout">
            </form>
        </div>
    </div>
</body>
</html>
