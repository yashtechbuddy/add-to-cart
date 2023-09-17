<?php

if (!isset($_SESSION['supplier_data'])) {
    session_destroy();

    header("Location:index.php");
    exit;
}