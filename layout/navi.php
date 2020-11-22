<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/casestudy2/cart/Cart.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/casestudy2/databaseWeb/productDB.php';
// $active = $_GET['active'];



session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>T.A FITNESS</title>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- main css -->
  <link rel="stylesheet" href="/casestudy2/css/style.css">
<!-- carousel -->

<link rel="stylesheet" href="/casestudy2/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="/casestudy2/css/owl.theme.default.min.css" type="text/css">



</head>

<body>

  <nav class="navbar navbar-expand-md  navbar-dark fixed-top custom-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">T.A FITNESS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end " id="collapsibleNavbar">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/casestudy2/index.php?active=home">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=1&active=cardio">CARDIO EQUIPMENT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=2&active=strength">STRENGTH EQUIPMENT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=3&active=grouptraining">GROUP TRAINING</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/casestudy2/masterLayout/addToCart.php">
              <i  class="fas fa-shopping-cart"></i>
              <span class="badge badge-light" id="iconCart">
                <?php
                if (isset($_SESSION['cart'])) {
                  echo $_SESSION['cart']->getTotalAmount();
                } else {
                  echo 0;
                }
                ?>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>