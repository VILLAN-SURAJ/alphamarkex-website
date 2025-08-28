<?php
// Database credentials
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'alphamarkex';

// Connect to database
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize inputs
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$services = isset($_POST['services']) ? implode(", ", $_POST['services']) : '';
$message = $conn->real_escape_string($_POST['message']);

// Insert into database
$sql = "INSERT INTO bookings (name, email, phone, services, message)
        VALUES ('$name', '$email', '$phone', '$services', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "✅ Booking submitted successfully.";
} else {
  echo "❌ Error: " . $conn->error;
}
$conn->close();
?>
