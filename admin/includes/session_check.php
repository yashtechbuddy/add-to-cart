<?php

if (!isset($_SESSION['admin_username'])) {
    session_destroy();

    header("Location:index.php");
    exit;
}
