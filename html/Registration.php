

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles/index.css" type="text/css"/>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('image/mt9_3.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        
        .form-container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            text-align: center;
            color: #2a5c82;
            margin-bottom: 20px;
            font-size: 28px;
        }

        label {
            font-size: 14px;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="email"], input[type="tel"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, input[type="password"]:focus {
            border-color: #f39c12;
            outline: none;
            background-color: #fff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: none;
            background: linear-gradient(45deg, #2a5c82, #f39c12);
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(45deg, #f39c12, #2a5c82);
        }

        .form-container a {
            text-decoration: none;
            color: #2a5c82;
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .form-container a:hover {
            color: #f39c12;
        }

        /* Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 500px) {
            .form-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Registration Form</h2>
        <form id="registrationForm" action="signUp.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email_address">Email Address:</label>
            <input type="email" id="email_address" name="email_address" required>

            <label for="contact">Contact:</label>
            <input type="tel" id="contact" name="contact" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register">
        </form>

        <a href="login.php">Already have an account? Login here</a>
    </div>

</body>
</html>
