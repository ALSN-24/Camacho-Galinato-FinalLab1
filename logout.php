<?php
    session_start();

    $_SESSION = [];
    session_destroy();
    
    setcookie('last_visit', '', time() - 3600, '/');
    header("Location: index.php");
    exit;
?>