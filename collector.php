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
    
    // Start transaction
    $conn->beginTransaction();

    // Capture form data on POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize input
        $vehicleInfo = filter_input(INPUT_POST, 'vehicleInfo', FILTER_SANITIZE_STRING);
        $collectionRoutes = filter_input(INPUT_POST, 'collectionRoutes', FILTER_SANITIZE_STRING);
        $totalCollected = filter_input(INPUT_POST, 'totalCollected', FILTER_VALIDATE_FLOAT);

        // Validate inputs
        if (!$vehicleInfo || !$collectionRoutes || !$totalCollected || $totalCollected < 0) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
            exit;
        }

        // Initialize pickup status
        $pickupStatus = 'pending'; // Default value
        $validStatuses = ['pending', 'picked up', 'cancelled'];
        if (!in_array($pickupStatus, $validStatuses)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid pickup status.']);
            exit;
        }

        // Get user_id from session
        $userId = $_SESSION['user_id'];

        // Get current date and time
        $pickupDate = date('Y-m-d H:i:s');

        // Insert data into collectordetails table
        $sqlCollector = "INSERT INTO collectordetails (user_id, vehicle_info, collection_route, total_collected_waste) VALUES (:userId, :vehicleInfo, :collectionRoutes, :totalCollected)";
        $stmtCollector = $conn->prepare($sqlCollector);

        // Bind parameters for collector details
        $stmtCollector->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmtCollector->bindParam(':vehicleInfo', $vehicleInfo, PDO::PARAM_STR);
        $stmtCollector->bindParam(':collectionRoutes', $collectionRoutes, PDO::PARAM_STR);
        $stmtCollector->bindParam(':totalCollected', $totalCollected, PDO::PARAM_STR); // Use PDO::PARAM_STR for float

        // Execute the query for collector details
        if ($stmtCollector->execute()) {
            // Commit the transaction
            $conn->commit();
            echo json_encode(['status' => 'success', 'message' => 'Collector record added successfully.']);
        } else {
            // Roll back transaction
            $conn->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Failed to add collector record.']);
        }
    }
} catch (PDOException $e) {
    // Roll back transaction
    $conn->rollBack();
    // Handle connection or execution errors
    error_log('Database error: ' . $e->getMessage()); // Log error in server logs
    echo json_encode(['status' => 'error', 'message' => 'Database error occurred.']);
}

// Close the connection (optional but good practice)
$conn = null;

?>