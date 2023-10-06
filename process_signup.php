<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $userId = $_POST["user_id"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Perform server-side validation (you can add more validation as per your requirements)

    // Database connection settings
    $servername = "localhost";
    $username = "your_username";
    $password_db = "your_database_password";
    $dbname = "your_database_name";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO users (user_id, password, email) VALUES ('$userId', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        header("Location: success.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
