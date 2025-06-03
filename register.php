<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$database = "student_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $birthDate = $_POST["birthDate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"] . " " . $_POST["address2"];

    // SQL query to insert data
    $sql = "INSERT INTO students (full_name, email, phone, birth_date, gender, address) 
            VALUES ('$fullName', '$email', '$phoneNumber', '$birthDate', '$gender', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successful!'); window.location.href='view_records.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
    }
}

$conn->close();
?>