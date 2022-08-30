<?php
    $host = 'localhost';
    $db   = 'orders';
    $user = 'root';
    $pass = 'root';
    $charset = 'UTF8MB4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);