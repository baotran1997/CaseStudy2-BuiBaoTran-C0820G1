<?php
include __DIR__ . "/../database/database.php";

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

    $sql = "INSERT INTO customers (customer_name, customer_phone, customer_email, customer_address, customer_city) 
            VALUES ('$customerName', '$customerPhone', '$customerEmail', '$customerAddress', '$customerCity') ";

    $result = $conn->query($sql);



    header('location:customersShow.php');
}

?>


<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>ADD PRODUCT</h1>
        </div>
        <div class="col-12">
            <form method="post">
               
                <div class="form-group">
                    <label for="customerName">Customer Name:</label>
                    <input type="text" class="form-control" name="customerName" id="customerName">
                </div>
                <div class="form-group">
                    <label for="customerPhone">Customer Phone:</label>
                    <input type="text" class="form-control" name="customerPhone" id="customerPhone">
                </div>
                <div class="form-group">
                    <label for="customerEmail">Customer Email:</label>
                    <input type="text" class="form-control" name="customerEmail" id="customerEmail">
                </div>
                <div class="form-group">
                    <label for="customerAddress">Customer Address:</label>
                    <input type="text" class="form-control" name="customerAddress" id="customerAddress">
                </div>
                <div class="form-group">
                    <label for="customerCity">Customer City:</label>
                    <input type="text" class="form-control" name="customerCity" id="customerCity">
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>