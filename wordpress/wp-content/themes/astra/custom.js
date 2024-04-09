jQuery(document).ready(function($) {
    // Wait for the document to be fully loaded
    $(document).on('submit', 'resubmitpaper', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        
        // Serialize the form data
        var formData = $(this).serialize();
        
        // Perform AJAX form submission
        $.ajax({
            type: 'POST', // Use POST method
            url: 'your-backend-url', // Replace with your backend URL
            data: formData, // Send form data
            dataType: 'json', // Expect JSON response
            success: function(response) {
                // Check if the submission was successful
                if (response.success) {
                    // Form submission successful, perform any success action
                    alert('Form submitted successfully!');
                } else {
                    // Form submission failed, display error message
                    alert('Form submission failed. Error: ' + response.error);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                // Handle AJAX error
                console.error('Error: ' + errorThrown);
            }
        });
    });
});
