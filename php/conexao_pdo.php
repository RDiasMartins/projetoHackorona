<?php
    $user = "bsts_projeto";
    $pass = "123proj456!";
    $db = "bsts_projeto";

    //$link = mysqli_connect("pluto.ignitionserver.net:3306", $user, $pass, $db);

    $link = new PDO("mysql:host=pluto.ignitionserver.net:3306;dbname=$db", $user, $pass);
?>
