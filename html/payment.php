<?php
// Include database connection
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect payment details from the form
    $user_id = $_POST['user_id']; // Make sure to validate user session to prevent unauthorized submissions
    $payment_amount = $_POST['payment_amount'];
    $payment_method = $_POST['payment_method'];

    // Optional: You can also add a check for the payment amount (e.g., should be a positive value)
    if ($payment_amount <= 0) {
        echo "Invalid payment amount.";
        exit();
    }

    // Set payment status to 'Pending' by default
    $status = 'Pending';

    // Insert the payment into the payments table
    $sql = "INSERT INTO payments (user_id, payment_amount, payment_method, status) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("idss", $user_id, $payment_amount, $payment_method, $status);

    if ($stmt->execute()) {
        echo "Payment submitted successfully. Your payment is being processed.";
    } else {
        echo "Error: " . $con->error;
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Payment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Make a Payment</h2>
        <form method="POST">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" required>
            
            <label for="payment_amount">Amount:</label>
            <input type="number" name="payment_amount" step="0.01" required>

            <label for="payment_method">Payment Method:</label>
            <input type="text" name="payment_method" required>

            <button type="submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>
