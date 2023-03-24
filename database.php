<?php
    $dbcon = new PDO("mysql:host=localhost;dbname=Project_blok7", "root", "");
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();
?> 