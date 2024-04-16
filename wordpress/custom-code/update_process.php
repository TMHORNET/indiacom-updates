<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "admin";
$password = "Sanchit@123";
$database = "Indiacom";
$port = 8889;

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted and paper_id is provided
    if(isset($_POST['submit']) && isset($_POST['paper_id'])) {
        $paper_id = $_POST['paper_id'];

        // Construct SQL UPDATE query to update the corresponding row in the database
        $sql = "UPDATE researchpaper SET ";
        foreach($_POST as $key => $value) {
            if($key != 'submit' && $key != 'paper_id') {
                $sql .= "`{$key}` = '{$value}', ";
            }
        }
        // Remove trailing comma and space
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE paper_id = :paper_id";

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':paper_id', $paper_id);
        $stmt->execute();

        // Close the database connection
        $conn = null;

        // Display confirmation message in an alert box
        echo "<script>alert('Paper updated successfully');</script>";

        // Redirect to the research paper page after 2 seconds
        echo "<script>window.location.href = '/wordpress/research%20paper';</script>";
    } else {
        echo "Form submission error: Paper ID not provided or form not submitted.";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

