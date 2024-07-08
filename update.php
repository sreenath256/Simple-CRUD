<?php
require 'users.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = getUserById($userId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateUser($userId, $_POST);
    header('Location: view.php?id=' . $userId);
    exit;
}
$title = 'Update | ' . $user['username'];
include 'partials/header.php'
?>


<div class="container mt-5 ">
    <div class="card">
        <div class="card-header">
            <h1>Update User</h1>
        </div>
        <?php if ($user) : ?>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="<?php echo htmlspecialchars($user['website']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="view.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-secondary">Cancel</a>
                </form>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    User not found.
                </div>
            <?php endif; ?>
            </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include 'partials/footer.php' ?>