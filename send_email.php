<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient_email = "shaileshmaheshwari133@gmail.com"; // Your email address
    $subject = "New Message from Your Website";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Compose the email message
    $email_message = "
    <html>
    <head>
        <title>New Message from Your Website</title>
    </head>
    <body>
        <h2>New Message from Your Website</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";

    // Send the email
    $mail_result = mail($recipient_email, $subject, $email_message, $headers);

    if ($mail_result) {
        header("Location: thank_you.html"); // Redirect to a thank-you page after sending the email
        exit;
    } else {
        echo "There was an error sending the email.";
    }
}
?>
