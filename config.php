<?php 

    $db = new PDO("mysql:host=localhost;dbname=rndtd_trading_db", "rndtd_trading_user", "Qwaszx@123");

 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES utf8");
    // require __DIR__.'/vendor/autoload.php';
    // use Kreait\Firebase\Factory;
    // This assumes that you have placed the Firebase credentials in the same directory
    // as this PHP file.
    // $factory = (new Factory)
    // ->withServiceAccount('trading-98e9f-firebase-adminsdk-lz9jy-76392c4828.json')
    // ->withDatabaseUri('https://trading-98e9f-default-rtdb.firebaseio.com/');
?>