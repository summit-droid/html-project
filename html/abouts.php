<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About ExploreNow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 1rem 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-left: 1.5rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ddd;
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .about-hero {
            background-image: url('image/tz.jpg'); /* Replace with your image */
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 5rem 0;
        }

        .about-hero h1 {
            font-size: 3rem;
            margin: 0;
        }

        section {
            margin-bottom: 3rem;
        }

        section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #007BFF;
            text-align: center;
        }

        .about-us, .our-values, .meet-the-team, .testimonials, .call-to-action {
            padding: 1.5rem;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .our-values ul {
            list-style: none;
            padding: 0;
        }

        .our-values li {
            margin-bottom: 0.5rem;
        }

        .meet-the-team {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .team-member {
            text-align: center;
            margin: 1rem;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 0.5rem;
        }

        .testimonials blockquote {
            font-style: italic;
            text-align: center;
            padding: 1rem;
            border-left: 3px solid #007BFF;
        }

        .call-to-action {
            text-align: center;
        }

        .cta-button {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 1rem 2rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 2rem 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
        }

        .footer-section {
            margin: 1rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
        }

        .footer-section a {
            color: #ddd;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: white;
        }

        .social-icons i {
            margin: 0 0.5rem;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .social-icons i:hover {
            color: #007BFF;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                margin-top: 1rem;
            }

            nav ul li {
                margin-left: 0;
                margin-bottom: 0.5rem;
            }

            .footer-content {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">ExploreNow</div>
            <ul>
                <li><a href="summit.php">Home</a></li>
                <li><a href="summit.php#packages">Packages</a></li>
                <li><a href="summit.php#destinations">Destinations</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="about-hero">
            <h1>About ExploreNow</h1>
        </section>

        <section class="about-us">
            <h2>Our Story</h2>
            <p>ExploreNow was founded on the belief that travel has the power to transform lives. We started as a small team of passionate travelers who wanted to make it easier for others to discover the world's hidden gems and experience authentic cultural immersion. [You can add a more personal anecdote about the founders or the initial inspiration here].</p>
            <p>Our mission is to provide exceptional travel experiences that are both enriching and sustainable. We carefully curate our tour packages, partnering with local guides and businesses that share our commitment to responsible tourism. We strive to create meaningful connections between travelers and the communities they visit, leaving a positive impact wherever we go.</p>
        </section>

        <section class="our-values">
            <h2>Our Values</h2>
            <ul>
                <li><strong>Authenticity:</strong> We believe in genuine travel experiences that connect you with the heart and soul of a destination.</li>
                <li><strong>Sustainability:</strong> We are committed to minimizing our environmental impact and supporting local communities.</li>
                <li><strong>Exceptional Service:</strong> We provide personalized service and expert guidance to ensure your trip is seamless and unforgettable.</li>
                <li><strong>Exploration:</strong> We encourage you to step off the beaten path and discover the hidden wonders of the world.</li>
            </ul>
        </section>

        <section class="meet-the-team">
            <h2>Meet the Team (Optional)</h2>
            <div class="team-member">
                <img src="team-member1.jpg" alt="Team Member 1">
                <h3>[Name]</h3>
                <p>Co-founder & Travel Enthusiast</p>
            </div>
        </section>

        <section class="testimonials">
            <h2>Testimonials</h2>
            <blockquote>
                "ExploreNow made my dream trip a reality! Their attention to detail and personalized service was exceptional." - John Smith
            </blockquote>
        </section>

        <section class="call-to-action">
            <p>Ready to plan your next adventure?</p>
            <a href="index.html#packages" class="cta-button">View Our Packages</a>
        </section