<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['staff_id'])) {
        header("location: login.php");
        exit;
    }
?>