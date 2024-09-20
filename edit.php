<?php
// Fetching user data for editing
include '../config/db.php';
include '../includes/header.php';

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!-- Edit User Form -->
<form action="../process/process_edit.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $user['id']; ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?= $user['name']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="profile_picture" class="form-label">Profile Picture</label>
        <input type="file" class="form-control" name="profile_picture">
        <img src="../uploads/<?= $user['profile_picture']; ?>" alt="Profile" width="50">
    </div>
    <button type="submit" class="btn btn-warning">Update User</button>
</form>

<?php include '../includes/footer.php'; ?>
