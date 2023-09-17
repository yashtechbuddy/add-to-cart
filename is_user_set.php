<?php

if(!isset($_SESSION['login-customer'])){
    header('Location:index.php');
}