<?php
session_start();
require 'users.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = getUserById($userId);
    if (!$user) {
        // Redirect to not_found.php if user does not exist
        header("Location: not_found.php");
        exit;
    }
} else {
    // Handle case where no ID is provided
    header("Location: not_found.php");
    exit;
}


$title = $user['username'];
include 'partials/header.php'
?>

<div class="container mt-5">
    <?php if ($user) : ?>
        <div class="card">
            <div class="card-header">
                <h1>User Details</h1>
            </div>
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['message_type']; ?>" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php unset($_SESSION['message']); ?>
                <?php unset($_SESSION['message_type']); ?>
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title">ID: <?php echo htmlspecialchars($user['id']); ?></h5>
                <h5 class="card-title">Username: <?php echo htmlspecialchars($user['username']); ?></h5>
                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                <p class="card-text"><strong>Website:</strong> <a target="_blank" href="https://<?php echo htmlspecialchars($user['website']); ?>"><?php echo htmlspecialchars($user['website']); ?></a></p>
                <a href="index.php" class="btn btn-primary">Back to Users</a>
                <a href="update.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-warning">Update</a>
                <a href="delete.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            User not found.
        </div>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include 'partials/footer.php' ?>