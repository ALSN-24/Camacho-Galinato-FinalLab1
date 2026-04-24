<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$name             = $_SESSION['user'];
$current_datetime = date("F j, Y - h:i A");

session_start();

session_start();
date_default_timezone_set('Asia/Manila');
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

    <p>Welcome, <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>!</p>

    <p>
        <?= $last_visit ? htmlspecialchars($last_visit, ENT_QUOTES, 'UTF-8') : 'No previous visit on record.' ?>
    </p>

    <hr>
    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>