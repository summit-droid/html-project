<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ExploreNow - Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>

       

        body {

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

            margin: 0;

            background-color: #4f4949;

            color: #333;

           

        }



        .dashboard-container {

            display: flex;

            height: 100vh;

        }



        .sidebar {

            width: 250px;

            background-color: #ffffff;

            padding: 20px;

            box-shadow: 2px 0 5px rgba(43, 38, 38, 0.1);

        }



        .sidebar h2 {

            margin-bottom: 20px;

        }



        .sidebar ul {

            list-style: none;

            padding: 0;

        }



        .sidebar li {

            margin-bottom: 10px;

        }



        .sidebar a {

            text-decoration: none;

            color: #333;

            display: block;

            padding: 10px;

            border-radius: 5px;

            transition: background-color 0.2s;

        }



        .sidebar a:hover {

            background-color: #eee;

        }



        .main-content {

            flex-grow: 1;

            padding: 20px;

            background-image: url('C:\Users\Admin\Desktop\html\image\434319832_188541.jpg');

            overflow-y: auto;

            background-position: center;

            background-size: auto;

        }



       

        .form-container {

            max-width: 400px;

            margin: 0 auto;

            padding: 20px;

            border: 1px solid #ccc;

            border-radius: 5px;

            background-color:none;

            background-image: url('C:\Users\Admin\Desktop\html\image\434319832_188541.jpg');

        }



        .form-container h2 {

            margin-bottom: 20px;

            text-align: center;

        }



        .form-group {

            margin-bottom: 15px;

        }



        .form-group label {

            display: block;

            margin-bottom: 5px;

        }



        .form-group input[type="email"],

        .form-group input[type="password"] {

            width: 100%;

            padding: 10px;

            border: 1px solid #ccc;

            border-radius: 5px;

            box-sizing: border-box;

        }



        .form-group button {

            background-color: #2a5c82;

            color: white;

            padding: 10px 15px;

            border: none;

            border-radius: 5px;

            cursor: pointer;

        }



       

    </style>

</head>

<body>

    <div class="dashboard-container">

        <div class="sidebar">

            <h2>ExploreNow</h2>

            <ul>

                <li><a href="#">Dashboard</a></li>

                <li><a href="#">Bookings</a></li>

                <li><a href="#">Profile</a></li>

                <li><a href="#">Settings</a></li>

                <li><a href="#">Logout</a></li> </ul>

                <li><a href="summit.html">Back to Summit</a></li>  </ul>

        </div>

        <div class="main-content" style="background-image: url(image/mt9_2.jpg);">

            <div id="registration-form" class="form-container">

                <h2>Register</h2>

                <form id="registerForm">

                    <div class="form-group">

                        <label for="reg-email">Email:</label>

                        <input type="email" id="reg-email" name="reg-email" required>

                    </div>

                    <div class="form-group">

                        <label for="reg-password">Password:</label>

                        <input type="password" id="reg-password" name="reg-password" required>

                    </div>

                    <button type="submit">Register</button>

                    <p>Already have an account? <a href="#" id="login-link">Login</a></p>

                </form>

            </div>



            <div id="login-form" class="form-container" style="display: none;">

                <h2>Login</h2>

                <form id="loginForm">

                    <div class="form-group">

                        <label for="login-email">Email:</label>

                        <input type="email" id="login-email" name="login-email" required>

                    </div>

                    <div class="form-group">

                        <label for="login-password">Password:</label>

                        <input type="password" id="login-password" name="login-password" required>

                    </div>

                    <button type="submit">Login</button>

                    <p>Don't have an account? <a href="#" id="register-link">Register</a></p>

                </form>

            </div>



            <div id="dashboard-content" style="display: none;">

                <h1>Welcome to your Dashboard!</h1>

                <p>This is where you'll see your bookings, profile information, and other important details.</p>

                </div>

        </div>

    </div>



    <script>

        const registrationForm = document.getElementById('registration-form');

        const loginForm = document.getElementById('login-form');

        const dashboardContent = document.getElementById('dashboard-content');

        const loginLink = document.getElementById('login-link');

        const registerLink = document.getElementById('register-link');

        const registerForm = document.getElementById('registerForm');

        const loginFormSubmit = document.getElementById('loginForm');



        loginLink.addEventListener('click', (event) => {

            event.preventDefault();

            registrationForm.style.display = 'none';

            loginForm.style.display = 'block';

            dashboardContent.style.display = 'none';

        });



        registerLink.addEventListener('click', (event) => {

            event.preventDefault();

            registrationForm.style.display = 'block';

            loginForm.style.display = 'none';

            dashboardContent.style.display = 'none';

        });



        registerForm.addEventListener('submit', (event) => {

            event.preventDefault();

            // Handle registration logic here (e.g., send data to server)

            alert('Registration submitted ');

            // After successful registration, you might want to switch to the login form

            loginForm.style.display = 'block';

            registrationForm.style.display = 'none';

        });



        loginFormSubmit.addEventListener('submit', (event) => {

            event.preventDefault();

            // Handle login logic here (e.g., send data to server for verification)

            alert('Login submitted ');

            // If login is successful, show the dashboard content

            dashboardContent.style.display = 'block';

            loginForm.style.display = 'none';

            registrationForm.style.display = 'none';

           

        });

    </script>

</body>

</html> 