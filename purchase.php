<?php
// Start session
session_start();

// Include configuration and notification files
require_once 'config/config.php'; // Ensure this file has the correct database credentials

// Set content type to JSON
header('Content-Type: application/json');

// Check if the user is logged in via user_id
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User  not authenticated.']);
    exit;
}

try {
    // Create a connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=wmc1", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capture form data on POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize input using filter_input
        $productOrdered = filter_input(INPUT_POST, 'product_type', FILTER_SANITIZE_STRING);
        $subscription = filter_input(INPUT_POST, 'subscription', FILTER_SANITIZE_STRING);
        $fixedPrice = filter_input(INPUT_POST, 'fixed_price', FILTER_VALIDATE_FLOAT);
        $unitOfMeasure = filter_input(INPUT_POST, 'unit_of_measure', FILTER_SANITIZE_STRING);
        $userId = $_SESSION['user_id'];

        // Validate inputs
        if (empty($productOrdered)) {
            echo json_encode(['status' => 'error', 'message' => 'Product type is required.']);
            exit;
        }
        if (empty($subscription)) {
            echo json_encode(['status' => 'error', 'message' => 'Subscription is required.']);
            exit;
        }
        if ($fixedPrice === false || $fixedPrice <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'Fixed price must be a valid decimal greater than zero.']);
            exit;
        }
        if (empty($unitOfMeasure)) {
            echo json_encode(['status' => 'error', 'message' => 'Unit of measure is required.']);
            exit;
        }

        // Start transaction
        $conn->beginTransaction();

        // Fetch consumer_id from consumerdetails table
        $consumerSql = "SELECT consumer_id FROM consumerdetails WHERE user_id = ?";
        $consumerStmt = $conn->prepare($consumerSql);
        $consumerStmt->execute([$userId]);
        $consumerData = $consumerStmt->fetch(PDO::FETCH_ASSOC);

        if (!$consumerData) {
            echo json_encode(['status' => 'error', 'message' => 'Consumer details not found.']);
            exit;
        }

        $consumerId = $consumerData['consumer_id']; // Use the correct column name

        // Insert into products table with an added date
        $productSql = "INSERT INTO products (product_type, subscription, fixed_price, unit_of_measure, created_at) VALUES (?, ?, ?, ?, NOW())";
        $productStmt = $conn->prepare($productSql);
        $productStmt->execute([$productOrdered, $subscription, $fixedPrice, $unitOfMeasure]);

        // Get the last inserted product ID
        $productId = $conn->lastInsertId();

        // Insert into orders table
        $orderSql = "INSERT INTO orders (consumer_id, order_date, total_amount, status) VALUES (?, NOW(), ?, 'Pending')";
        $orderStmt = $conn->prepare($orderSql);
        $totalAmount = $fixedPrice; // Assuming total amount is the same as fixed price for this example
        $orderStmt->execute([$consumerId, $totalAmount]);

        // Get the last inserted order ID
        $orderId = $conn->lastInsertId();

        // Insert into order_items table with order_id
        $orderItemSql = "INSERT INTO order_items (order_id, product_id, product_quality) VALUES (?, ?, ?)";
        $orderItemStmt = $conn->prepare($orderItemSql);
        $orderItemStmt->execute([$orderId, $productId, $unitOfMeasure]); // Using unitOfMeasure directly as product quality

        // Commit the transaction
        $conn->commit();

        // Trigger notification for the order
        sendOrderNotification($conn, $consumerId, $productId);

        // Return success response
        echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.']);
    }
} catch (PDOException $e) {
    // Rollback transaction in case of error
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    // Handle any other exceptions
    echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
}
?>