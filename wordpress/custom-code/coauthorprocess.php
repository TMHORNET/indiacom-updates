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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paper_id = $_POST["paper_id"];
    $selected_users = $_POST["selected_users"];

    // Check if paper_id and selected_users fields are empty
    if (empty($paper_id) || empty($selected_users)) {
        echo "<script>alert('Please select a paper and at least one co-author'); window.location.href = 'http://localhost:8888/wordpress/co-author-manage/';</script>";
    } else {
        // Update researchpaper table with selected co-authors
        $sql = "UPDATE researchpaper SET contact_author_id = '$selected_users' WHERE paper_id = $paper_id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Co-Authors added successfully'); window.location.href = 'http://localhost:8888/wordpress/indiacom/';</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    }
}

$conn->close();
?>
