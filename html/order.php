<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Redirect to login if user is not logged in
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f); /* Deep blue to red gradient */
            margin: 0;
            padding: 0;
            color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .booking-container {
            width: 80%;
            max-width: 600px;
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.6);
        }

        h2 {
            text-align: center;
            color: #ff6f61; /* Coral accent color */
            margin-bottom: 30px;
            border-bottom: 2px solid #ff6f61;
            padding-bottom: 10px;
        }

        label {
            display: block;
            margin: 15px 0 8px;
            color: #ecf0f1;
        }

        input[type="text"],
        input[type="datetime-local"],
        input[type="number"],
        select {
            width: calc(100% - 22px);
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #555;
            background-color: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
        }

        .price-display {
            margin: 20px 0;
            font-size: 1.2em;
            text-align: center;
            color: #ff6f61;
        }

        input[type="submit"],
        .print-button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #ff6f61;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        input[type="submit"]:hover,
        .print-button:hover {
            background-color: #e06054;
        }
    </style>
</head>
<body>

    <div class="booking-container">
        <h2>Booking Form</h2>
        <form id="bookingForm" method="post" action="booking.php">

            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <input type="hidden" name="package_id" value="456">

            <label for="visitor">Who are you visiting?</label>
            <input type="text" id="visitor" name="visitor" required>

            <label for="features">Categories of Features:</label>
            <select id="features" name="features" required>
                <option value="">Select...</option>
                <option value="beautiful beaches">Beautiful Beaches</option>
                <option value="historical sites">Historical Sites</option>
                <option value="mountains">Mountains</option>
                <option value="wildlife">Wildlife</option>
                <option value="full tour">full tour</option>
                <option value="beautiful beaches/historical sites">beautiful beaches/historical sites</option>
                <option value="historical sites/wildlife">historical sites/wildlife</option>
                <option value="beautiful beaches/wildlife">beautiful beaches/wildlife</option>
                <option value="mountains/beautiful beaches">mountains/beautiful beaches</option>
                <option value="mountains/historical sites">mountains/historical sites</option>
            </select>

            <label for="datetime">Date and Time:</label>
            <input type="datetime-local" id="datetime" name="datetime" required>

            <label for="people">How many people are you booking for?</label>
            <input type="number" id="people" name="people" min="1" required>

            <div class="price-display" id="priceDisplay">Total Price: $0</div>

            <input type="submit" value="Book Now">
        </form>

        <button class="print-button" id="printButton">Print Booking Details</button>
    </div>

    </body>
</html>