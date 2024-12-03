<?php
function getProjects($conn) {
    $stmt = $conn->prepare("SELECT * FROM projects ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProjectById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM projects WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addProject($conn, $title, $description, $image, $link) {
    $stmt = $conn->prepare("INSERT INTO projects (title, description, image, link) VALUES (:title, :description, :image, :link)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':link', $link);
    return $stmt->execute();
}

function updateProject($conn, $id, $title, $description, $image, $link) {
    $stmt = $conn->prepare("UPDATE projects SET title = :title, description = :description, image = :image, link = :link WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':link', $link);
    return $stmt->execute();
}

function deleteProject($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM projects WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function saveContact($conn, $name, $email, $message) {
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    return $stmt->execute();
}

function getContacts($conn) {
    $stmt = $conn->prepare("SELECT * FROM contacts ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

