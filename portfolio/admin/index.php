<?php
session_start();
require_once '../config.php';
require_once '../functions.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$projects = getProjects($conn);
$contacts = getContacts($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="admin-panel">
        <h1>Admin Panel</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
        
        <h2>Projects</h2>
        <a href="add_project.php" class="add-btn">Add New Project</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?php echo $project['id']; ?></td>
                        <td><?php echo htmlspecialchars($project['title']); ?></td>
                        <td><?php echo htmlspecialchars($project['description']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($project['image']); ?>" alt="Project Image" width="100"></td>
                        <td><?php echo htmlspecialchars($project['link']); ?></td>
                        <td>
                            <a href="edit_project.php?id=<?php echo $project['id']; ?>">Edit</a>
                            <a href="delete_project.php?id=<?php echo $project['id']; ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Contact Submissions</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $contact['id']; ?></td>
                        <td><?php echo htmlspecialchars($contact['name']); ?></td>
                        <td><?php echo htmlspecialchars($contact['email']); ?></td>
                        <td><?php echo htmlspecialchars($contact['message']); ?></td>
                        <td><?php echo $contact['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

