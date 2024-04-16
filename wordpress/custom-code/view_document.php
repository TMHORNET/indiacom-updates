<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Document</title>
</head>
<body>
    <h2>View Document</h2>
    <?php
    // Get the document path from the query string
    $document_path = isset($_GET['path']) ? $_GET['path'] : '';

    // Display the document in an iframe if a path is provided
    if (!empty($document_path)) {
        $file_extension = pathinfo($document_path, PATHINFO_EXTENSION);
        $supported_types = array('pdf', 'ppt', 'pptx', 'doc', 'docx');
        if (in_array($file_extension, $supported_types)) {
            echo "<iframe src='{$document_path}' width='100%' height='600px'></iframe>";
        } else {
            echo "Unsupported document type.";
        }
    } else {
        echo "Document path not provided.";
    }
    ?>
</body>
</html>
