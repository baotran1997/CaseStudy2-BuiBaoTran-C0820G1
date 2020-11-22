<?php
include __DIR__ . "/../database/database.php";

// get id from edit button in customersShow.php

$id = $_GET['id'];

// show value before edit customers 

$queryCustomer = "SELECT * FROM customers WHERE customer_id = $id";
$resultCustomer = $conn->query($queryCustomer);
$resultCustomer = $resultCustomer->fetch();

//form

$customerName = '';
$customerPhone = '';
$customerEmail = '';
$customerAddress = '';
$customerCity = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   
    if (isset($_POST['customerName'])) {
        $customerName = $_POST['customerName'];
    }
    if (isset($_POST['customerPhone'])) {
        $customerPhone = $_POST['customerPhone'];
    }
    if (isset($_POST['customerEmail'])) {
        $customerEmail = $_POST['customerEmail'];
    }
    if (isset($_POST['customerAddress'])) {
        $customerAddress = $_POST['customerAddress'];
    }
    if (isset($_POST['customerCity'])) {
        $customerCity = $_POST['customerCity'];
    }


    $sql = "UPDATE `customers` 
            SET  customer_name = '$customerName', customer_phone = '$customerPhone', customer_email = '$customerEmail', customer_address = '$customerAddress', customer_city = '$customerCity'
            WHERE customer_id = $id ";

    $result = $conn->query($sql);

    header('location:customersShow.php');
}




?>


<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>EDIT CUSTOMER</h1>
        </div>
        <div class="col-12">
            <form method="post">
              
                <div class="form-group">
                    <label for="customerName">Customer Name:</label>
                    <input type="text" class="form-control" name="customerName" id="customerName" value="<?= $resultCustomer['customer_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="customerPhone">Customer Phone:</label>
                    <input type="text" class="form-control" name="customerPhone" id="customerPhone" value="<?= $resultCustomer['customer_phone']; ?>">
                </div>
                <div class="form-group">
                    <label for="customerEmail">Customer Email:</label>
                    <input type="text" class="form-control" name="customerEmail" id="customerEmail" value="<?= $resultCustomer['customer_email']; ?>">
                </div>
                <div class="form-group">
                    <label for="customerAddress">Customer Address:</label>
                    <input type="text" class="form-control" name="customerAddress" id="customerAddress" value="<?= $resultCustomer['customer_address']; ?>">
                </div>
                <div class="form-group">
                    <label for="customerCity">Customer City:</label>
                    <input type="text" class="form-control" name="customerCity" id="customerCity" value="<?= $resultCustomer['customer_city']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>