<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .card {
            max-width: 400px;
            padding: 2rem;
            text-align: center;
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="container" style="display: flex; justify-content: center;">
        <div class="card">
            <h1 class="text-danger"> User Not Found</h1>
            <p class="lead">The user you are trying to delete is not exist, had its already deleted, or is temporarily unavailable.</p>
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</body>

</html>
