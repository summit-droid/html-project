

<?php

include('db.php');

if (isset($_POST['first_name'])) {
    // Sanitize and validate the input
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email_address']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $password = htmlspecialchars(trim($_POST['password']));
    

    // $stm = 'INSERT INTO USERS (first_name, last_name, email, password, contact_number) values ('Daggy', 'Wanja', 'wanja@gmail.com',1234, 0712345678)';
    // $con->query($stm);

    $stmt = $con->prepare("INSERT INTO Users (first_name, last_name, email, password, contact_number) VALUES (?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }

    // Bind parameters
    // $firstNameParam = "Daggy";
    // $lastNameParam = "Wanja";
    // $emailParam = "wanja@gmail.com";
    // $passwordParam = password_hash('1234', PASSWORD_DEFAULT); 
    // $contactNumberParam = "0712345678"; // Store as string

    $stmt->bind_param("sssss", $firstName, $lastName, $email, $password, $contact);

    // Execute the statement
    if ($stmt->execute()) {
        redirect: header("Location: login.php"); exit();
        // echo "New record created successfully";

    } else {
        echo "Error: " . $stmt->error;
    }


    // Basic validation (e.g., check length, allowed characters)
    // if (empty($firstName)) {
    //     echo "First name cannot be empty.";
    // } else {
    //     echo "First name: " . $firstName;
    // }
} else {
    echo "First name not submitted.";
}

$con->close(); // Close the connection when done
?>

