<?php
    if (!isset($_SESSION['staff_id'])) {
        header("location: login.php");
    }
?>