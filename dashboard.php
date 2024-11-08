<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header('Location: login.php');
  exit;
}

// Display the user's role
echo 'Welcome, ' . $_SESSION['username'] . ' (' . $_SESSION['role'] . ')';
?>