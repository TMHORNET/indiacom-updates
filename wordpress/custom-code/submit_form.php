<?php
$servername = "127.0.0.1";
$username = "admin";
$password = "Sanchit@123";
$database = "Indiacom";
$port = 8889;

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['course'])) {
    // Sanitize inputs to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $course = $conn->real_escape_string($_POST['course']);

    // Prepare checkbox values
    $checkboxValues = "";
    if(isset($_POST['checkbox'])) {
        $checkboxNames = [];
        foreach($_POST['checkbox'] as $checkbox) {
            // Sanitize each checkbox value to prevent SQL injection
            $checkboxNames[] = $conn->real_escape_string($checkbox);
        }
        $checkboxValues = implode(', ', $checkboxNames);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO testing (name, phone, course, testvalue) VALUES ('$name', '$phone', '$course', '$checkboxValues')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
