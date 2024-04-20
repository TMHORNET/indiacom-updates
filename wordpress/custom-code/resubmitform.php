<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load WordPress environment
require_once('/Applications/MAMP/htdocs/wordpress/wp-load.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['paper_id'])) {
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

            // Get current user ID from WordPress
            $current_user_id = get_current_user_id();

            // Get data from the form
            $paper_id = $_POST['paper_id'];

            // Handle file uploads for revised paper
            $document_path = uploadFile($_FILES['revised_paper'], 'revised_papers/');

            // Handle file uploads for plagiarism report (if uploaded)
            $plag_path = null;
            if (!empty($_FILES['plag_report']['name'])) {
                $plag_path = uploadFile($_FILES['plag_report'], 'plagiarism_reports/');
            }

            // Handle file uploads for presentation (if uploaded)
            $presentation_path = null;
            if (!empty($_FILES['ppt']['name'])) {
                $presentation_path = uploadFile($_FILES['ppt'], 'presentations/');
            }

            // Set additional fields
            $date_of_last_update = date('d-m-Y H:i:s'); // Format: yyyy-mm-dd HH:ii:ss
            $status = 'pending';

            // Prepare SQL statement to update data in the database
            $sql = "UPDATE researchpaper 
                    SET date_of_last_update = :date_of_last_update, status = :status";
            if ($document_path !== null) {
                $sql .= ", document_path = :document_path";
            }
            if ($plag_path !== null) {
                $sql .= ", plag_path = :plag_path";
            }
            if ($presentation_path !== null) {
                $sql .= ", presentation_path = :presentation_path";
            }
            $sql .= " WHERE paper_id = :paper_id AND mid = :mid";

            // Bind parameters
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':date_of_last_update', $date_of_last_update);
            $stmt->bindParam(':status', $status);
            if ($document_path !== null) {
                $stmt->bindParam(':document_path', $document_path);
            }
            if ($plag_path !== null) {
                $stmt->bindParam(':plag_path', $plag_path);
            }
            if ($presentation_path !== null) {
                $stmt->bindParam(':presentation_path', $presentation_path);
            }
            $stmt->bindParam(':paper_id', $paper_id);
            $stmt->bindParam(':mid', $current_user_id);
            
            // Execute the statement
            $stmt->execute();

            // Display a confirmation message and redirect after user confirmation
            echo '<script>
                    if(confirm("Paper updated successfully! Click OK to continue.")) {
                        window.location.href = "http://localhost:8888/wordpress/resubmitpaper/";
                    }
                  </script>';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } else {
        echo "Please fill in all required fields.";
    }
}

// Function to handle file uploads
function uploadFile($file, $upload_dir) {
    if (!empty($file['name'])) {
        $target_dir = '/wp-content/uploads/' . $upload_dir;
        $file_name = $file['name'];
        $file_name_parts = pathinfo($file_name);
        $file_extension = strtolower($file_name_parts['extension']);
        $unique_id = uniqid();
        $new_file_name = $file_name_parts['filename'] . '_' . $unique_id . '.' . $file_extension;
        $target_file = $_SERVER['DOCUMENT_ROOT'] . $target_dir . $new_file_name;

        // Check if directory exists, if not create it
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $target_dir)) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . $target_dir, 0755, true);
        }

        // Check file size
        if ($file["size"] > 5000000) {
            echo '<script>alert("Sorry, your file is too large.");</script>';
            return null;
        }
        // Allow certain file formats
        $allowed_extensions = array("pdf", "doc", "docx", "ppt", "pptx");
        if (!in_array($file_extension, $allowed_extensions)) {
            echo '<script>alert("Sorry, only PDF, DOC, DOCX, PPT, and PPTX files are allowed.");</script>';
            return null;
        }

        // Upload file
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_dir . $new_file_name;
        } else {
            echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
            return null;
        }
    }
    return null;
}
?>
