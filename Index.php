<?php
include '../config/db.php';
include '../includes/header.php';

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetching users with pagination
$query = "SELECT * FROM users LIMIT $start, $limit";
$result = mysqli_query($conn, $query);

// Count total records
$countQuery = "SELECT COUNT(id) AS total FROM users";
$countResult = mysqli_query($conn, $countQuery);
$row = mysqli_fetch_assoc($countResult);
$totalRecords = $row['total'];
$totalPages = ceil($totalRecords / $limit);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($user = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['name']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><img src="../uploads/<?= $user['profile_picture']; ?>" alt="Profile" width="50"></td>
            <td>
                <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="../process/process_delete.php?id=<?= $user['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<nav>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>

<?php include '../includes/footer.php'; ?>
