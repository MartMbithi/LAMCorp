<?php
    session_start();
    unset($_SESSION['wp_id']);
    session_destroy();

    header("Location: index.php");
    exit;
?>