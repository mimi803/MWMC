<?php

require_once 'config/config.php';

header('Content-Type: application/json'); // Set content type to JSON

session_start(); // Start session to access user data if logged in

// Check if the user is logged in via user_role_id
if (!isset($_SESSION['user_role_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User  not authenticated.']);
    exit;
}

try {
    // Create a connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=wmc", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capture form data on POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize input
        $processingCapacity = filter_input(INPUT_POST, 'processingCapacity', FILTER_VALIDATE_FLOAT);
        $productsMade = filter_input(INPUT_POST, 'productsMade', FILTER_SANITIZE_STRING);

        // Validate inputs
        if ($processingCapacity === false || $processingCapacity < 0 || empty($productsMade)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
            exit;
        }

        // Get user_role_id from session
        $userRoleId = $_SESSION['user_role_id'];

        // Insert data into manufacturedetails table
        $sql = "INSERT INTO manufacturerdetails (user_role_id, processing_capacity, products_made) 
                VALUES (:userRoleId, :processingCapacity, :productsMade)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':userRoleId', $userRoleId, PDO::PARAM_INT);
        $stmt->bindParam(':processingCapacity', $processingCapacity, PDO::PARAM_STR); // Use PDO::PARAM_STR for float
        $stmt->bindParam(':productsMade', $productsMade, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Manufacture record added successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add manufacture record.']);
        }
    }
} catch (PDOException $e) {
    // Handle connection or execution errors
    error_log('Database error: ' . $e->getMessage()); // Log error in server logs
    echo json_encode(['status' => 'error', 'message' => 'Database error occurred: ' . $e->getMessage()]);
}

// Close the connection (optional but good practice)
$conn = null;

?>