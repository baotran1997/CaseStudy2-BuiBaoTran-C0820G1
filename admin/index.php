
<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header('location: home/login.php');
    die();
}
?>

<?php require_once "./layout/header.php" ?>
<?php require_once "./layout/footer.php" ?>