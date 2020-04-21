<?php

    try {
      $link = new PDO('mysql:host=localhost:3307;dbname=projeto', 'root', 'usbw');
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    /*
    $user = "bsts_projeto";
    $pass = "123proj456!";
    $db = "bsts_projeto";

    //$link = mysqli_connect("pluto.ignitionserver.net:3306", $user, $pass, $db);

    $link = new PDO("mysql:host=pluto.ignitionserver.net:3306;dbname=$db", $user, $pass);
    */
?>
