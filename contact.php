<?php
// === DATABASE CONNECTION ===
$servername = "localhost";   // Change if needed (e.g. sql211.infinityfree.com)
$username = "root";          // your MySQL username
$password = "";              // your MySQL password
$dbname = "portfolio_db";    // same as created above

$conn = new mysqli($servername, $username, $password, $dbname);

// === Check Connection ===
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// === Collect Form Data ===
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// === Insert into Database ===
$sql = "INSERT INTO contact_messages (name, email, subject, message)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
