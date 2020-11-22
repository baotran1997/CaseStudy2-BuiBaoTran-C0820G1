<?php
$servername = 'localhost';
$username = 'root';
$password = '0935332882';
$dns = 'mysql:host=' . $servername . ';dbname=casestudy2';

try {
    $conn = new PDO($dns, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>