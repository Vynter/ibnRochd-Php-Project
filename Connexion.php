<?php

$servername = "127.0.0.1";
$database = "cvapp";
$username = "root";
$password = "root";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
echo "ok";