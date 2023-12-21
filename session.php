<?php
session_start();

// Function to check if the user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to track the current page
function setCurrentPage($page) {
    $_SESSION['current_page'] = $page;
}

// Function to get the current page
function getCurrentPage() {
    return isset($_SESSION['current_page']) ? $_SESSION['current_page'] : '';
}

// Function to redirect if not logged in
function redirectToLogin() {
    if (!isUserLoggedIn()) {
        header("Location: login.php"); // Redirect to your login page
        exit();
    }
}

// Example usage:

// At the beginning of each page where you want to track the user's login status and current page
setCurrentPage($_SERVER['REQUEST_URI']);

// Uncomment the line below if you want to force users to log in before accessing any page
// redirectToLogin();
?>
