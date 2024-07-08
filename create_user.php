<?php
session_start();

require 'users.php';

$title = 'Create User';
include 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUserId = createUser($_POST);
    if ($newUserId) {
        header("Location:view.php?id=$newUserId");
    } else {
        header("Location:create_user.php");
    }
}

?>

<div class="container mt-5">
    <h1>Create User</h1>
    <?php if (isset($_SESSION['err-message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['err-message_type']; ?>" role="alert">
            <?php echo $_SESSION['err-message']; ?>
        </div>
        <?php unset($_SESSION['err-message']); ?>
        <?php unset($_SESSION['err-message_type']); ?>
    <?php endif; ?>
    <form method="POST" action="create_user.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" class="form-control" id="website" name="website" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script>
    (function() {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

<?php include 'partials/footer.php' ?>