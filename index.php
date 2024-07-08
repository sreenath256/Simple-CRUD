<?php
require 'users.php';
$users = getUsers();
$title = 'Users';
include 'partials/header.php'
?>
<div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <h1>Users</h1>
            <a href="create_user.php" class="btn btn-success">Add User</a>
        </div>
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?>" role="alert">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
            <?php unset($_SESSION['message_type']); ?>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">WEBSITE</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($users as $i=> $user) : ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($i+1); ?></th>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['phone']); ?></td>
                        <td><?php echo htmlspecialchars($user['website']); ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-primary">View</a>
                            <a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-secondary">Update</a>
                            <a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'partials/footer.php' ?>