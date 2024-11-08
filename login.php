<?php
session_start();

require_once 'config/config.php';

try {
    // Establish the connection
    $conn = new PDO("mysql:host=$servername;dbname=wmc1", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . htmlspecialchars($e->getMessage())); // Escape error message
}

$error = '';

// Check if the login form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT user_id, password, role FROM user WHERE name = :name";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $username, PDO::PARAM_STR); // Bind the name for user lookup
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and verify the password
    if ($row && password_verify($password, $row['password'])) {
        // Regenerate session ID for security
        session_regenerate_id(true);

        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = htmlspecialchars($username);
        $_SESSION['role'] = $row['role']; // Store role in session for further use

        // Redirect user based on role
        switch ($row['role']) {
            case 'Contributor':
                header('Location: public/contributor_dashboard.php');
                break;
            case 'Collector':
                header('Location: public/collector_dashboard.php');
                break;
            case 'Manufacturer':
                header('Location: public/manufacturer_dashboard.php');
                break;
            case 'Consumer':
                header('Location: public/consumer_dashboard.php');
                break;
           
        }
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}

// Display error if needed
if ($error) {
    echo "<p style='color: red;'>" . htmlspecialchars($error) . "</p>"; // Escape error message for safety
}

// Close the connection
$conn = null;
?>
 