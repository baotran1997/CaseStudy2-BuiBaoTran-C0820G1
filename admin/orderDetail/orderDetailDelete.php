<?php
include __DIR__ . "/../database/database.php";

$id = $_GET['id'];

$sql = "DELETE FROM orderdetail WHERE id_orderdetail = $id";

$result = $conn->query($sql);

header('location:orderDetailShow.php');
