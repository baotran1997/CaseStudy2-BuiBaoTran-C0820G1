<?php
include __DIR__ . "/../database/database.php";

$id = $_GET['id'];

$sql = "DELETE FROM orders WHERE order_number= $id";

$result = $conn->query($sql);

header('location:ordersShow.php');
