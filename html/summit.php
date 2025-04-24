<?php
session_start();
include('db.php');

// Check if the user is logged in by verifying session
if (!isset($_SESSION['user'])) {
    echo "You are not logged in!";
    exit();
}

// Get user data from the database
$user_id = $_SESSION['user'];
$sql = "SELECT first_name, last_name, email, profile_picture, created_at FROM users WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $profile_picture, $created_at);
$stmt->fetch();
$stmt->close();

// If user data is not found (in case of invalid session), log out
if (!$first_name) {
    echo "No user data found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExploreNow - Tourism Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

:root {
            --primary-color: #2a5c82;
            --secondary-color: #f39c12;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-image: url('C:\Users\Admin\Desktop\html\image\434319832_188541.jpg');
        }

        /* Header Styles */
        .header {
            background: var(--primary-color);
            padding: 1rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        /* Hero Section */
        .hero {
            background-color: none;
            background: none;
            background-repeat: no-repeat; 
            background-position: center; 
            background-size: cover;           
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: rgb(194, 32, 32);
            padding: 2rem;
        }

        .search-box {
            background: rgba(255,255,255,0.9);
            padding: 2rem;
            border-radius: 10px;
            max-width: 800px;
            width: 90%;
        }

        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        /* Packages Section */
        .packages {
            padding: 4rem 2rem;
            background: var(--primary-color);
            
        }

        .package-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .package-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .package-card:hover {
            transform: translateY(-5px);
        }

        .package-info {
            padding: 1rem;
        }

        .package-info h3 {
            margin-bottom: 0.5rem;
        }

        .package-info .price {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        /* Footer Styles */
        .footer {
            background: var(--primary-color);
            color: white;
            padding: 3rem 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero {
                height: 60vh;
            }
        }
        .profile-container {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }
        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .profile-details {
            font-size: 18px;
        }
        .profile-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .profile-details p {
            margin-bottom: 5px;
        }
        .destinations{
            changeBackgroundImag
        }
    </style>
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">ExploreNow</div>
        <nav class="nav-links">
            <a href="#home">Home</a>
            <a href="#packages">Packages</a>
            <a href="#destinations">Destinations</a>
            <a href="abouts.php">About</a>
            <a href="contacts.php">Contact</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
            <a href="profile.php">profile</a>
        </nav>
    </header>
    
    <section class="profile">
        <div class="profile-container">
            <!-- Display Profile Picture or Default Image -->
            <img src="uploads/<?php echo $profile_picture ? $profile_picture : 'default.jpg'; ?>" alt="Profile Picture">

            <div class="profile-details">
                <h2><?php echo $first_name . ' ' . $last_name; ?></h2>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Account Created:</strong> <?php echo $created_at; ?></p>
            </div>
        </div>
    </section>

    <!-- Optionally, you can add a button to update the profile here -->
    <section class="update-profile">
        <a href="edit_profile.php"><button>Update Profile</button></a>
    </section>

    <section class="hero" style="background-image: url(image/mt9_3.jpg); ">
        <div class="search-box">
            <h1>Discover Your Next Adventure</h1>
            <form class="search-form" method ="get" action= "search.php">
                <input type="text" placeholder="Destination">
                <select>
                    <option>Tour Type</option>
                    <option>Adventure</option>
                    <option>Cultural</option>
                    <option>Beach</option>
                </select>
                <input type="date" placeholder="Check-in">
                <input type="date" placeholder="Check-out">
                <button type="submit">Search</button>
            </form>
        </div>
    </section>

    <section class="packages" id="packages">
        <h2>Popular Tour Packages</h2>
        <div class="package-grid">
            <div class="package-card">
                <img src="image/mt1_6.jpg" alt="Mountain Tour" style="width:100%">
                <div class="package-info">
                    <h3>Alpine Adventure</h3>
                    <p>5 Days/4 Nights</p>
                    <div class="price">$899</div>
                    <button data-destination="Mountain Tour">Book Now</button>
                </div>
            </div>
            <div class="package-card">
                <img src="image/3_1.jpg" alt="Beach Resort" style="width:100%">
                <div class="package-info">
                    <h3>Tropical Getaway</h3>
                    <p>7 Days/6 Nights</p>
                    <div class="price">$1299</div>
                    <button data-destination="Beach Resort">Book Now</button>
                </div>
            </div>
             <div class="package-card">
                <img src="image/mt4.jpg" alt="Cultural Tour" style="width:100%">
                <div class="package-info">
                    <h3>Ancient Cities Tour</h3>
                    <p>6 Days/5 Nights</p>
                    <div class="price">$999</div>
                    <button data-destination="Cultural Tour">Book Now</button>
                </div>
            </div>
             <div class="package-card">
                <img src="image/mount.jpg" alt="MOUNT Tour" style="width:100%">
                <div class="package-info">
                    <h3>Mount kenya</h3>
                    <p>6 Days/5 Nights</p>
                    <div class="price">$1000</div>
                    <button data-destination="Mount kenya">Book Now</button>
                </div>
            </div>
            <div class="package-card">
                <img src="image/marine.jpg" alt="MARINE Tour" style="width:100%">
                <div class="package-info">
                    <h3>marine exploration</h3>
                    <p>6 Days/5 Nights</p>
                    <div class="price">$899</div>
                    <button data-destination="marine exploration">Book Now</button>
                </div>
            </div>
             <div class="package-card">
                <img src="image/camp.jpg" alt="ADVENTURE Tour" style="width:100%">
                <div class="package-info">
                    <h3>hiking and camps</h3>
                    <p>6 Days/5 Nights</p>
                    <div class="price">$979</div>
                    <button data-destination="hiking and camps">Book Now</button>
                </div>
            </div>
             <div class="package-card">
                <img src="image/wild.jpg" alt="Cultural Tour" style="width:100%">
                <div class="package-info">
                    <h3>wildlife </h3>
                    <p>6 Days/5 Nights</p>
                    <div class="price">$1349</div>
                    <button data-destination="wildlife ">Book Now</button>
                </div>
            </div>
             <div class="package-card">
                <img src="image/bitch.jpg" alt="Cultural Tour" style="width:100%">
                <div class="package-info">
                    <h3>Beaches and water exploration</h3>
                    <p>6 Days/5 Nights</p>
                    <div class="price">$3229</div>
                    <button data-destination="Beaches and water exploration">Book Now</button>
                </div>
            </div>
             <div class="package-card">
                <img src="image/other.jpg" alt="Cultural Tour" style="width:100%">
                <div class="package-info">
                    <h3>OTHERS </h3>
                    <p>6 Days/5 Nights</p>
                    <div class="price">$4000</div>
                    <button data-destination="OTHERS ">Book Now</button>
                </div>
            </div>
        </div>
    </section>

    <section class="destinations" id="destinations">
        <h2>Featured Destinations</h2>
        <div class="destination-grid">
            <div class="destination-card">
                <img src="image/kenya.jpg" alt="kenya" style="width: 100%;">
                <div class="destination-info">
                    <h3>kenya</h3>
                    <p>Historical places, Cultural and amazing</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="image/tz.jpg" alt="Tanzania" style="width: 100%;">
                <div class="destination-info">
                    <h3>Tanzania </h3>
                    <p>Land of diverse culture, amazing features and beaches </p>
                </div>
            </div>
            <div class="destination-card">
                <img src="image/safrica.jpg" alt="s.Africa" style="width: 100%;">
                <div class="destination-info">
                    <h3>South Africa </h3>
                    <p>Brreath taking nature full of wildlife and deserts</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Email: info@explorenow.com</p>
            <p>Phone: +1 (555) 768-222</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <a href="about.html">About Us</a>
            <a href="#terms">Terms & Conditions</a>
            <a href="#privacy">Privacy Policy</a>
        </div>
        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
    <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
    <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
    <a href="https://twitter.com/" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
</div>
        </div>
    </footer>

    <script>
        // Slideshow Script
        let images = [
              // Image 3
            'image/marine.jpg', // Image 4
            'image/mount.jpg',   // Image 5
            'image/other.jpg',
            'image/wild.jpg',
            'image/safrica.jpg',
        ];

        let currentImageIndex = 0;

        // Function to change the background image
        function changeBackgroundImage() {
            const heroSection = document.querySelector('.hero');
            heroSection.style.backgroundImage = `url(${images[currentImageIndex]})`;
            currentImageIndex = (currentImageIndex + 1) % images.length;
        }

        // Change background every 5 seconds
        setInterval(changeBackgroundImage, 5000);

        // Initialize the first background image
        changeBackgroundImage();

        document.querySelectorAll('.package-card button').forEach(button => {
            button.addEventListener('click', () => {
                const destination = button.getAttribute('data-destination');
                window.location.href = `order.php?destination=${encodeURIComponent(destination)}`;
            });
        });
    </script>
</body>
</html>

</body>
</html>