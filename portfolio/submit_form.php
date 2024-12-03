<?php
require_once 'config.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($name) || empty($email) || empty($message)) {
        $response = ['success' => false, 'message' => 'Please fill all fields.'];
    } else {
        $result = saveContact($conn, $name, $email, $message);
        if ($result) {
            $response = ['success' => true, 'message' => 'Thank you for your message! We\'ll get back to you soon.'];
        } else {
            $response = ['success' => false, 'message' => 'An error occurred. Please try again later.'];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

