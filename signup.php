<?php
require_once 'config/config.php';

// Capture form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['contact_info'];
$location = $_POST['location'];
$role = $_POST['role']; 
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate form data
if (empty($name) || empty($email) || empty($phone) || empty($location) || empty($password) || empty($confirm_password)) {
    echo "Please fill in all fields.";
    exit;
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
}



// Check if passwords match
if ($password != $confirm_password) {
    echo "Passwords do not match.";
    exit;
}

// Hash password securely
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement to insert into the user table
$sql = "INSERT INTO user (name, email, contact_info, location, password, role) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Execute the prepared statement for user
if ($stmt->execute([$name, $email, $phone, $location, $password_hash, $role])) {
    // Get the last inserted user ID
    $user_id = $conn->lastInsertId();

    // Insert user ID into relevant tables based on role
    if ($role == 'consumer') {
        $consumer_details_sql = "INSERT INTO consumerdetails (user_id) VALUES (?)";
        $consumer_details_stmt = $conn->prepare($consumer_details_sql);
        $consumer_details_stmt->execute([$user_id]);
    } elseif ($role == 'contributor') {
        $contributor_details_sql = "INSERT INTO contributordetails (user_id) VALUES (?)";
        $contributor_details_stmt = $conn->prepare($contributor_details_sql);
        $contributor_details_stmt->execute([$user_id]);
    } elseif ($role == 'collector') {
        $collector_details_sql = "INSERT INTO collectordetails (user_id) VALUES (?)";
        $collector_details_stmt = $conn->prepare($collector_details_sql);
        $collector_details_stmt->execute([$user_id]);
    } elseif ($role == 'manufacturer') {
        $manufacturer_details_sql = "INSERT INTO manufacturerdetails (user_id) VALUES (?)";
        $manufacturer_details_stmt = $conn->prepare($manufacturer_details_sql);
        $manufacturer_details_stmt->execute([$user_id]);
    }

    // Always insert into notifications and review_rating
    $notification_sql = "INSERT INTO notifications (user_id) VALUES (?)";
    $notification_stmt = $conn->prepare($notification_sql);
    $notification_stmt->execute([$user_id]);

    $review_rating_sql = "INSERT INTO reviews_ratings (user_id) VALUES (?)";
    $review_rating_stmt = $conn->prepare($review_rating_sql);
    $review_rating_stmt->execute([$user_id]);

    // Redirect to login page
    header("Location: public/login.html");
    exit(); 
} else {
    echo "Error inserting user: " . implode(", ", $stmt->errorInfo());
}

$stmt = null;
$conn = null;
?>