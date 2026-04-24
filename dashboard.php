<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$name             = $_SESSION['user'];
$current_datetime = date("F j, Y - h:i A");

// last visit before overwriting
$last_visit = isset($_COOKIE['last_visit']) ? $_COOKIE['last_visit'] : null;

// cookie named 'last_visit' — expires in 1 day
setcookie('last_visit', $current_datetime, time() + 86400, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check-In | Dashboard</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 80px auto; padding: 0 16px; }
        hr   { margin: 16px 0; }
        a.logout { color: red; }
    </style>
</head>
<body>
    <h2>Daily Check-In Tracker</h2>
    <hr>

    <p>Welcome, <?= $name ?>!</p>

    <p>Today is: <?= $current_datetime ?></p>

    <p>
        <?= $last_visit ? htmlspecialchars($last_visit, ENT_QUOTES, 'UTF-8') : 'No previous visit on record.' ?>
    </p>

    <hr>
    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>