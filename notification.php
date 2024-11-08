<?php
require_once 'config/config.php';
require_once 'purchase.php';

try {
    // Create a connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=wmc1", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Function to send order notification
    function sendOrderNotification($conn, $userId, $orderId) {
        // Fetch user email from the database
        $emailSql = "SELECT email FROM users WHERE id = :userId";
        $emailStmt = $conn->prepare($emailSql);
        $emailStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $emailStmt->execute();
        
        $user = $emailStmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $to = $user['email'];

            // Validate the email format
            if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
                error_log("Invalid email format for user ID: $userId");
                return; // Exit if email is invalid
            }

            $subject = "Order Confirmation - Order #$orderId";
            $message = "Dear User,\n\nThank you for your order!\nYour order ID is: $orderId\n\nWe will process your order shortly.\n\nBest regards,\nYour Company Name";
            $headers = "From: no-reply@yourdomain.com\r\n" .
                       "Reply-To: no-reply@yourdomain.com\r\n" .
                       "X-Mailer: PHP/" . phpversion();

            // Send email
            if (mail($to, $subject, $message, $headers)) {
                error_log("Notification sent successfully to $to for order ID: $orderId");
            } else {
                error_log("Failed to send notification to $to for order ID: $orderId");
            }
        } else {
            error_log("User  email not found for user ID: $userId");
        }
    }

} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
}
?>