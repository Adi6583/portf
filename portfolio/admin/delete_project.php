<?php
session_start();
require_once '../config.php';
require_once '../functions.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$result = deleteProject($conn, $id);
if ($result) {
    header('Location: index.php');
} else {
    echo "Failed to delete project. <a href='index.php'>Go back</a>";
}

