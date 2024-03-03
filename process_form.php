<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    // Form validation
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid form submission. Please fill in all required fields.";
        exit;
    }

    // Set up email variables
    $to = hieutran1015@yahoo.com; // Replace with your personal email
    $subject = "New Contact Form Submission";
    $headers = "From: $name <$email>";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n$message";

    // Send the email
    $mailSuccess = mail($to, $subject, $email_message, $headers);

    if ($mailSuccess) {
        // Optionally, you can redirect the user after successful submission
        header("Location: thank-you.html"); // Create a thank-you page
        exit;
    } else {
        echo "Error sending email. Please try again later.";
    }
}
?>
