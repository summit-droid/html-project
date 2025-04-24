



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4a148c, #880e4f); /* Deep purple to red gradient */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #ecf0f1; /* Light text color */
        }

        .login-container {
            width: 350px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent dark background */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.6);
        }

        h2 {
            text-align: center;
            color: #e91e63; /* Pink accent color */
            margin-bottom: 30px;
            border-bottom: 2px solid #e91e63;
            padding-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ecf0f1;
        }

        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 22px);
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #555;
            background-color: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
        }

        input[type="submit"] {
            background-color: #e91e63;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ad1457;
        }

        .error-message {
            color: #ff6666; /* Light red error color */
            font-size: 0.9em;
            display: none;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="signIn.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <div class="error-message" id="loginError">Invalid email or password.</div>

            <input type="submit" value="Login">
        </form>
    </div>

    <script>
        // JavaScript for login logic (if needed)
        // Note: The commented-out code was removed because it was using local storage and was not secure
        // Real-world login should always be handled server-side.
    </script>
</body>
</html>