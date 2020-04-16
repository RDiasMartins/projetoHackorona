<?php
    try {
      $link = new PDO('mysql:host=localhost:3307;dbname=projeto', 'root', 'usbw');
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>
