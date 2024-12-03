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

$project = getProjectById($conn, $id);
if (!$project) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';
    $link = $_POST['link'] ?? '';

    if (empty($title) || empty($description) || empty($image) || empty($link)) {
        $error = 'All fields are required';
    } else {
        $result = updateProject($conn, $id, $title, $description, $image, $link);
        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $error = 'Failed to update project';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="admin-form">
        <h1>Edit Project</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea>

            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($project['image']); ?>" required>

            <label for="link">Project Link:</label>
            <input type="text" id="link" name="link" value="<?php echo htmlspecialchars($project['link']); ?>" required>

            <button type="submit">Update Project</button>
        </form>
        <a href="index.php">Back to Admin Panel</a>
    </div>
</body>
</html>

