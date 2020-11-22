<?php
include __DIR__ . '/../database/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE category_id = $id";

$result = $conn->query($sql);

header('location:categoriesShow.php');
