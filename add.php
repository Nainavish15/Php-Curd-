<?php include '../includes/header.php'; ?>
<form action="../process/process_add.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="profile_picture" class="form-label">Profile Picture</label>
        <input type="file" class="form-control" name="profile_picture" required>
    </div>
    <button type="submit" class="btn btn-primary">Add User</button>
</form>
<?php include '../includes/footer.php'; ?>
