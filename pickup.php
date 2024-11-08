<?php

require_once 'config/config.php';

header('Content-Type: application/json'); // Set content type to JSON

session_start(); // Start session to access user data if logged in

// Check if the user is logged in via user_id
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not authenticated.']);
    exit;
}

try {
    // Create a connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=wmc1", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capture form data on POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize input
        $wasteType = filter_input(INPUT_POST, 'wasteType', FILTER_SANITIZE_STRING);
        $wasteAmount = filter_input(INPUT_POST, 'wasteAmount', FILTER_VALIDATE_FLOAT); // Changed to FLOAT for decimal values
        $pickupDate = filter_input(INPUT_POST, 'pickupDate', FILTER_SANITIZE_STRING); // Assume date is sent as a string
        $pickupStatus = 'Pending'; // Default status when adding a new record

        // Validate inputs
        $validWasteTypes = ['organic', 'metal', 'plastic', 'paper', 'hazardous'];
        if (!in_array($wasteType, $validWasteTypes) || !$wasteAmount || $wasteAmount <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid waste type or amount.']);
            exit;
        }

        // Validate pickup date format (YYYY-MM-DD)
        $dateRegex = '/^\d{4}-\d{2}-\d{2}$/';
        if (!preg_match($dateRegex, $pickupDate)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid pickup date format.']);
            exit;
        }

        // Get user_id from session
        $userId = $_SESSION['user_id'];

        // Insert data into contributordetails table for each request
        $sql = "INSERT INTO contributordetails (user_id, waste_type, waste_amount, pickup_date, pickup_status) 
                VALUES (:userId, :wasteType, :wasteAmount, :pickupDate, :pickupStatus)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':wasteType', $wasteType, PDO::PARAM_STR);
        $stmt->bindParam(':wasteAmount', $wasteAmount, PDO::PARAM_STR); // Use PARAM_STR for decimal values
        $stmt->bindParam(':pickupDate', $pickupDate, PDO::PARAM_STR);
        $stmt->bindParam(':pickupStatus', $pickupStatus, PDO::PARAM_STR); // Default to 'Pending'

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Waste record added successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add waste record.']);
        }
    }
} catch (PDOException $e) {
    // Handle connection or execution errors
    error_log('Database error: ' . $e->getMessage()); // Log error in server logs
    echo json_encode(['status' => 'error', 'message' => 'Database error occurred.']);
}

// Close the connection (optional but good practice)
$conn = null;

?>