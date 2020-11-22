<?php
session_start();
if (isset($_GET['logout'])) {
    unset($_SESSION['login_user']);
    header("Location: login.php");
}

?>