<?php
include '../database/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE product_code =  '$id' ";

$result = $conn->query($sql);

header('location:productsShow.php');
