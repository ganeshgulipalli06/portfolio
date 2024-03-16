<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set recipient email address
    $to = 'ganeshgulipalli1234@gmail.com';

    // Set subject
    $subject = 'New Contact Form Submission';

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email";

    // Send the email
    $success = mail($to, $subject, $email_content, $headers);

    if ($success) {
        echo json_encode(['status' => 'success', 'message' => 'Form submitted successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to submit form. Please try again.']);
    }
} else {
    // Handle invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

?>
