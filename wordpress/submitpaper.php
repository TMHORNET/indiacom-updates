<?php
include '../../mydbfile.php'; 

$fields = $_POST; // Assuming all fields are coming from $_POST
$current_date = date('d-m-y H:i:s'); // Format current date as dd-mm-yy h-m-s
$output['success'] = $conn->query("INSERT INTO researchpaper (name, mid, email, title, date_of_submission, date_of_last_update, event_id, track_id, subject_code, document_path, abstract_path, contact_author_id, review_result) VALUES (
    '{$fields['name']}', 
    '{$fields['mid']}', 
    '{$fields['email']}', 
    '{$fields['title']}', 
    '{$current_date}', 
    '{$current_date}', 
    '{$fields['event']}', 
    '{$fields['track']}', 
    '{$fields['session']}', 
    '{$fields['paper']}', 
    '{$fields['plag']}', 
    '{$fields['authors']}', 
    '{$fields['status']}'
)");

$conn->close();
?>
