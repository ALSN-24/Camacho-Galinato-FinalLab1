<?php
session_start();
date_default_timezone_set('Asia/Manila');

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$name             = $_SESSION['user'];
$current_datetime = date("F j, Y - h:i A");

// Read last visit BEFORE overwriting the cookie
$last_visit = isset($_COOKIE['last_visit']) ? $_COOKIE['last_visit'] : null;

// Set/update cookie named 'last_visit' — expires in 1 day
setcookie('last_visit', $current_datetime, time() + 86400, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-In | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container vh-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-sm-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-3">Daily Check-In Tracker</h4>
                        <hr>

                        <p class="mb-2">
                            <strong>Welcome,</strong> <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>!
                        </p>

                        <p class="mb-2">
                            <strong>Today is:</strong> <?= $current_datetime ?>
                        </p>

                        <p class="mb-3">
                            <strong>Last Visit:</strong>
                            <?= $last_visit
                                ? htmlspecialchars($last_visit, ENT_QUOTES, 'UTF-8')
                                : 'No previous visit on record.' ?>
                        </p>

                        <hr>
                        <form method="POST" action="logout.php">
                            <button type="submit" class="btn btn-danger w-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>