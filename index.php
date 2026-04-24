<?php
    session_start();
    date_default_timezone_set('Asia/Manila');

    if (isset($_SESSION['user'])) {
        header("Location: dashboard.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        if ($name !== '') {
            $_SESSION['user'] = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            if (!isset($_COOKIE['last_visit'])) {
                setcookie('last_visit', date("F d, Y - h:i A"), time() + 86400, '/');
            }
            header("Location: dashboard.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container vh-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-sm-4 text-center">
                <h4 class="mb-4">Daily Check-In Tracker</h4>
                <form action="index.php" method="POST">
                    <div class="mb-3 text-start">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Check In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>