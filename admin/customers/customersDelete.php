<?php
include '../database/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM customers WHERE customer_id =  '$id' ";

$result = $conn->query($sql);

header('location:customersShow.php');
